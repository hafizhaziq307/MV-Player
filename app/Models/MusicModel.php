<?php

namespace App\Models;

use CodeIgniter\Model;
use stdClass;

class MusicModel extends Model
{
    public function getMusics($singerName): array
    {
        $musics = array();

        foreach (glob(FCPATH . "singers/$singerName/songs/*", GLOB_ONLYDIR) as $musicFolder) {

            $musicName = basename($musicFolder);

            $music = new stdClass;
            $music->name = $musicName;
            $music->thumbnail = "/singers/$singerName/songs/$musicName/$music->name.jpg";
            $music->video = "/singers/$singerName/songs/$musicName/$music->name.webm";

            array_push($musics, $music);
        }

        return $musics;
    }

    public function getMusic($singerName, $musicName): object
    {
        $music = new stdClass;
        $music->name = $musicName;
        $music->thumbnail = "/singers/$singerName/songs/$musicName/$music->name.jpg";
        $music->video = "/singers/$singerName/songs/$musicName/$music->name.webm";

        return $music;
    }
}
