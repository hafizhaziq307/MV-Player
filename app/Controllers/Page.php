<?php

namespace App\Controllers;

use App\Models\SingerModel;

class Page extends BaseController
{
    public function home()
    {
        $singerModel = new SingerModel;

        return view('pages/home', [
            'singers' => $singerModel->getSingerswithMusics()
        ]);
    }
}
