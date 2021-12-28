<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Singer;

class SingerController extends Controller
{

    public function __construct()
    {
        $this->Singer = new Singer;
    }

    public function index()
    {
        return view('singers/index', [
            'singers' => $this->Singer->getSingers()
        ]);
    }


    public function create()
    {
        return view('singers/create');
    }


    public function store(Request $request)
    {
        $name = ucwords(strtolower($request->input('name')));
        $file = $request->file('profile');

        chdir('file');

        if (!file_exists($name)) {
            mkdir($name);
            chdir($name);
            mkdir('songs');
            $file->move(public_path() . "/file/$name", 'profile.jpg');
        }
        return redirect()
            ->route('singers.index')
            ->with("msg", "Singer Created Successfully.");
    }


    public function edit($name)
    {
        return view('singers/edit', [
            'singer' => $this->Singer->getSinger($name)
        ]);
    }


    public function update(Request $request, $name)
    {
        switch ($request->input('type')) {
            case 'name':
                $newName = ucwords(strtolower($request->input('newname')));
                rename(public_path() . "/file/$name", public_path() . "/file/$newName");
                break;

            case 'image':
                $file = $request->file('profile');
                $file->move(public_path() . "/file/$name", "profile.jpg", true);
                break;
        }
        return redirect()
            ->route('singers.index')
            ->with("msg", "Singer Updated Successfully.");
    }


    public function destroy($name)
    {
        // remove all musics directory
        array_map(
            function ($directory) use ($name) {

                // remove content inside music direetory
                array_map(function ($content) {
                    unlink($content);
                }, glob(public_path() . "/file/$name/songs/$directory/*.*"));

                rmdir(public_path() . "/file/$name/songs/$directory");
            },
            array_values(array_diff(scandir(public_path() . "/file/$name/songs"), array('..', '.')))
        );

        // remove profile
        unlink(public_path() . "/file/$name/profile.jpg");

        // remove songs directory
        rmdir(public_path() . "/file/$name/songs");

        //remove singer directory
        rmdir(public_path() . "/file/$name");

        return redirect()
            ->route('singers.index')
            ->with("msg", "Singer Deleted Successfully.");
    }
}
