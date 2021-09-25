<?php

namespace App\Controllers;

use App\Models\SingerModel;

class Music extends BaseController
{
    public function index()
    {
        $singerModel = new SingerModel;

        return view('pages/music/index', [
            'singers' => $singerModel->getSingerswithMusics()
        ]);
    }

    public function create()
    {
        $singerModel = new SingerModel;

        return view('pages/music/create', [
            'singers' => $singerModel->getSingers()
        ]);
    }

    public function edit($musicName, $singerName)
    {
        $singerModel = new SingerModel;

        return view('pages/music/edit', [
            'singer' => $singerModel->getSingerwithMusic($singerName, $musicName),
        ]);
    }

    public function save()
    {
        $singer = $this->request->getVar('singer');
        $name = ucwords(strtolower($this->request->getVar('name')));
        $file = $this->request->getFile('file');

        chdir(FCPATH . "singers/$singer/songs");

        if (!file_exists($name)) {
            mkdir($name);
        }

        $file->move(FCPATH . "singers/$singer/songs/$name", "$name.webm");

        copy(FCPATH . "images/default-thumbnail.jpg", FCPATH . "singers/$singer/songs/$name/$name.jpg");

        return redirect()->route('music_index');
    }

    public function update($musicName, $singerName)
    {
        $newName = ucwords(strtolower($this->request->getVar('newName')));

        array_map(
            function ($val) use ($singerName, $musicName, $newName) {
                if (strpos($val, '.jpg') != 0) {
                    rename($val, FCPATH . "singers/$singerName/songs/$musicName/$newName.jpg");
                }

                if (strpos($val, '.webm') != 0) {
                    rename($val, FCPATH . "singers/$singerName/songs/$musicName/$newName.webm");
                }
            },
            glob(FCPATH . "singers/$singerName/songs/$musicName/*.*")
        );

        rename(FCPATH . "singers/$singerName/songs/$musicName", FCPATH . "singers/$singerName/songs/$newName");

        return redirect()->route('music_index');
    }

    public function delete($musicName, $singerName)
    {
        array_map(function ($val) {
            unlink($val);
        }, glob(FCPATH . "singers/$singerName/songs/$musicName/*.*"));

        rmdir(FCPATH . "singers/$singerName/songs/$musicName");

        return redirect()->route('music_index');
    }
}
