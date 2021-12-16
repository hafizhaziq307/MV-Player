<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Singer;
use App\Models\Music;
use stdClass;

class PageController extends Controller
{
    public function home()
    {
        $Singer = new Singer;
        $Music = new Music;


        $musics = array();

        foreach ($Singer->getSingers() as $singer) {

            $artistName = $singer->name;

            foreach ($Music->getMusics($singer->name) as $music) {
                $item = new stdClass;
                $item->artist = $artistName;
                $item->title = $music->name;
                $item->thumbnail = $music->thumbnail;
                $item->video = $music->video;

                array_push($musics, $item);
            }
        }

        usort($musics, function ($a, $b) {
            return strcmp($a->title, $b->title);
        });

        return view('home', compact('musics'));
    }
}
