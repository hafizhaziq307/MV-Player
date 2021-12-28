<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;
use App\Models\Music;

class Singer extends Model
{
    use HasFactory;

    public function getSingerswithMusics(): array
    {
        $musicModel = new Music;
        $singers = array();

        foreach (glob(public_path() . '/file/*', GLOB_ONLYDIR) as $singerFolder) {

            $singerName = basename($singerFolder);

            $singer = new stdClass;
            $singer->name = $singerName;
            $singer->profile = "/file/$singerName/profile.jpg";
            $singer->musics = $musicModel->getMusics($singerName);

            array_push($singers, $singer);
        }

        return $singers;
    }

    public function getSingerwithMusic($singerName, $musicName): object
    {
        $Music = new Music;

        $singer = new stdClass;
        $singer->name = $singerName;
        $singer->profile = "/file/$singerName/profile.jpg";
        $singer->music = $Music->getMusic($singerName, $musicName);

        return $singer;
    }


    public function getSingers(): array
    {
        $singers = array();

        foreach (glob(public_path() . '/file/*', GLOB_ONLYDIR) as $singerFolder) {

            $singerName = basename($singerFolder);

            $singer = new stdClass;
            $singer->name = $singerName;
            $singer->profile = "/file/$singerName/profile.jpg";

            array_push($singers, $singer);
        }

        return $singers;
    }

    public function getSinger($singerName): object
    {
        $singer = new stdClass;
        $singer->name = $singerName;
        $singer->profile = "/file/$singerName/profile.jpg";

        return $singer;
    }
}
