<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Singer;

class MusicController extends Controller
{
    public function __construct()
    {
        $this->Singer = new Singer;
    }

    /**
     * Index music page
     */
    public function index()
    {
        $singers = $this->Singer->getSingerswithMusics();

        return view('musics.index', compact('singers'));
    }

    /**
     * Create music page
     */
    public function create()
    {
        return view('musics/create', [
            'singers' => $this->Singer->getSingers()
        ]);
    }

    /**
     * Edit music page
     */
    public function edit($musicName, $singerName)
    {
        return view('musics/edit', [
            'singer' => $this->Singer->getSingerwithMusic($singerName, $musicName),
        ]);
    }

    /**
     * Store new music
     */
    public function store(Request $request)
    {
        $singer = $request->input('singer');
        $name = ucwords(strtolower($request->input('name')));
        $file = $request->file('file');

        chdir(public_path() . "/file/$singer/songs");

        if (!file_exists($name)) {
            mkdir($name);
        }

        $file->move(public_path() . "/file/$singer/songs/$name", "$name.webm");

        copy(public_path() . "/images/default-thumbnail.jpg", public_path() . "/file/$singer/songs/$name/$name.jpg");

        return redirect()
            ->route('musics.index')
            ->with("msg", "Music Created Successfully.");
    }

    /**
     * Update existing music
     */
    public function update(Request $request, $singerName, $musicName)
    {
        $newName = ucwords(strtolower($request->input('newname')));

        array_map(
            function ($val) use ($singerName, $musicName, $newName) {
                if (strpos($val, '.jpg') != 0) {
                    rename($val, public_path() . "/file/$singerName/songs/$musicName/$newName.jpg");
                }

                if (strpos($val, '.webm') != 0) {
                    rename($val, public_path() . "/file/$singerName/songs/$musicName/$newName.webm");
                }
            },
            glob(public_path() . "/file/$singerName/songs/$musicName/*.*")
        );

        rename(public_path() . "/file/$singerName/songs/$musicName", public_path() . "/file/$singerName/songs/$newName");

        return redirect()
            ->route('musics.index')
            ->with("msg", "Music Updated Successfully.");
    }


    /**
     * Delete existing music
     */
    public function destroy($singerName, $musicName)
    {
        array_map(function ($val) {
            unlink($val);
        }, glob(public_path() . "/file/$singerName/songs/$musicName/*.*"));

        rmdir(public_path() . "/file/$singerName/songs/$musicName");

        return redirect()
            ->route('musics.index')
            ->with("msg", "Music Deleted Successfully.");
    }
}
