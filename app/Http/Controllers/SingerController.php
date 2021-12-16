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

        // dd($request->file('profile')->storeAs('file', 'profile.jpg'));

        chdir('file');

        if (!file_exists($name)) {
            mkdir($name);
            chdir($name);
            mkdir('songs');
            $file->move(public_path() . "/file/$name", 'profile.jpg');
        }
        return redirect()->route('singers.index');
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
                $newName = ucwords(strtolower($request->input('newName')));
                rename(public_path() . "singers/$name", public_path() . "singers/$newName");
                break;

            case 'profile':
                $file = $request->file('profile');
                $file->move(public_path() . "singers/$name", "profile.jpg", true);
                break;
        }
        return redirect()->route('singer_index');
    }


    public function destroy($name)
    {
        // remove all musics directory
        array_map(
            function ($directory) use ($name) {

                // remove content inside music direetory
                array_map(function ($content) {
                    unlink($content);
                }, glob(public_path() . "singers/$name/songs/$directory/*.*"));

                rmdir(public_path() . "singers/$name/songs/$directory");
            },
            array_values(array_diff(scandir(public_path() . "singers/$name/songs"), array('..', '.')))
        );

        // remove profile
        unlink(public_path() . "singers/$name/profile.jpg");

        // remove songs directory
        rmdir(public_path() . "singers/$name/songs");

        //remove singer directory
        rmdir(public_path() . "singers/$name");

        return redirect()->route('singer_index');
    }
}
