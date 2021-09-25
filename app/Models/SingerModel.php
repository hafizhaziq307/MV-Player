<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\MusicModel;
use stdClass;

class SingerModel extends Model
{
    public function getSingerswithMusics(): array
    {
        $musicModel = new MusicModel;
        $singers = array();

        foreach (glob(FCPATH . 'singers/*', GLOB_ONLYDIR) as $singerFolder) {

            $singerName = basename($singerFolder);

            $singer = new stdClass;
            $singer->name = $singerName;
            $singer->profile = "/singers/$singerName/profile.jpg";
            $singer->musics = $musicModel->getMusics($singerName);

            array_push($singers, $singer);
        }

        return $singers;
    }

    public function getSingerwithMusic($singerName, $musicName): object
    {
        $musicModel = new MusicModel;

        $singer = new stdClass;
        $singer->name = $singerName;
        $singer->profile = "/singers/$singerName/profile.jpg";
        $singer->music = $musicModel->getMusic($singerName, $musicName);

        return $singer;
    }


    public function getSingers(): array
    {
        $singers = array();

        foreach (glob(FCPATH . 'singers/*', GLOB_ONLYDIR) as $singerFolder) {

            $singerName = basename($singerFolder);

            $singer = new stdClass;
            $singer->name = $singerName;
            $singer->profile = "/singers/$singerName/profile.jpg";

            array_push($singers, $singer);
        }

        return $singers;
    }

    public function getSinger($singerName): object
    {
        $singer = new stdClass;
        $singer->name = $singerName;
        $singer->profile = "/singers/$singerName/profile.jpg";

        return $singer;
    }
}
