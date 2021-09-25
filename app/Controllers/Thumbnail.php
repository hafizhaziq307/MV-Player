<?php

namespace App\Controllers;

use App\Models\SingerModel;

class Thumbnail extends BaseController
{
    public function create($musicName, $singerName)
    {
        $singerModel = new SingerModel;

        return view('pages/thumbnail/create', [
            'singer' => $singerModel->getSingerwithMusic($singerName, $musicName)
        ]);
    }

    public function save()
    {
        $singer = $this->request->getVar('singer');
        $songname = ucwords(strtolower($this->request->getVar('songname')));
        $file = $this->request->getFile('file');

        $file->move(FCPATH . "singers/$singer/songs/$songname", "$songname.jpg", true);

        return redirect()->route('music_index');
    }
}
