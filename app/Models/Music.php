<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class Music extends Model
{
    use HasFactory;

    public function getMusics(String $singerName): array
    {
        $musics = array();

        foreach (glob(public_path() . "/file/$singerName/songs/*", GLOB_ONLYDIR) as $musicFolder) {

            $musicName = basename($musicFolder);

            $music = new stdClass;
            $music->name = $musicName;
            $music->thumbnail = "/file/$singerName/songs/$musicName/$music->name.jpg";
            $music->video = "/file/$singerName/songs/$musicName/$music->name.webm";

            array_push($musics, $music);
        }

        return $musics;
    }

    public function getMusic(String $singerName, String $musicName): object
    {
        $music = new stdClass;
        $music->name = $musicName;
        $music->thumbnail = "/file/$singerName/songs/$musicName/$music->name.jpg";
        $music->video = "/file/$singerName/songs/$musicName/$music->name.webm";

        return $music;
    }
}
