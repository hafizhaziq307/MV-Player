<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Singer;

class ThumbnailController extends Controller
{
    public function __construct()
    {
        $this->Singer = new Singer;
    }

    public function create($singerName, $musicName)
    {
        return view('thumbnails/create', [
            'singer' => $this->Singer->getSingerwithMusic($singerName, $musicName)
        ]);
    }

    public function store(Request $request)
    {
        $singer = $request->input('singer');
        $songname = ucwords(strtolower($request->input('songname')));
        $video = $request->file('video');

        $video->move(public_path() . "/file/$singer/songs/$songname", "$songname.jpg", true);

        return redirect()->route('musics.index');
    }
}
