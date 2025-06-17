<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\media;
use Database\Seeders\MediaSeeder;
use Illuminate\Http\Request;


class MediaController extends Controller
{
    public function index()
    {
        $medias= media::latest()->get();
        return view ('admin.medias.index-medias',compact('medias'));
    }
}
