<?php

namespace App\Http\Controllers;

use App\Models\About;

class HomeController extends Controller
{
    public function index()
    {
        $about = About::latest()->first();
        return view('pages.home-page.index-home',['about'=>$about]);
    }

    public function notFound()
    {
        return view('notFound');
    }
}
