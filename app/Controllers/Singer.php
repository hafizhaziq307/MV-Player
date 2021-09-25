<?php

namespace App\Controllers;

use App\Models\SingerModel;

class Singer extends BaseController
{
    public function index()
    {
        $singerModel = new SingerModel;

        return view('pages/singer/index', [
            'singers' => $singerModel->getSingers()
        ]);
    }

    public function create()
    {
        return view('pages/singer/create');
    }

    public function save()
    {
        $name = ucwords(strtolower($this->request->getVar('name')));
        $file = $this->request->getFile('profile');

        chdir(FCPATH . 'singers');

        if (!file_exists($name)) {
            mkdir($name);
            chdir($name);
            mkdir('songs');
            $file->move(FCPATH . "singers/$name", 'profile.jpg');
        }
        return redirect()->route('singer_index');
    }

    public function edit($singerName)
    {
        $singerModel = new SingerModel;

        return view('pages/singer/edit', [
            'singer' => $singerModel->getSinger($singerName)
        ]);
    }

    public function update($singerName)
    {
        switch ($this->request->getVar('type')) {
            case 'name':
                $newName = ucwords(strtolower($this->request->getVar('newName')));
                rename(FCPATH . "singers/$singerName", FCPATH . "singers/$newName");
                break;

            case 'profile':
                $file = $this->request->getFile('profile');
                $file->move(FCPATH . "singers/$singerName", "profile.jpg", true);
                break;
        }
        return redirect()->route('singer_index');
    }

    public function delete($singerName)
    {
        // remove all musics directory
        array_map(
            function ($directory) use ($singerName) {

                // remove content inside music direetory
                array_map(function ($content) {
                    unlink($content);
                }, glob(FCPATH . "singers/$singerName/songs/$directory/*.*"));

                rmdir(FCPATH . "singers/$singerName/songs/$directory");
            },
            array_values(array_diff(scandir(FCPATH . "singers/$singerName/songs"), array('..', '.')))
        );

        // remove profile
        unlink(FCPATH . "singers/$singerName/profile.jpg");

        // remove songs directory
        rmdir(FCPATH . "singers/$singerName/songs");

        //remove singer directory
        rmdir(FCPATH . "singers/$singerName");

        return redirect()->route('singer_index');
    }
}
