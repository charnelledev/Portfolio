<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Laravel\Prompts\table;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medias')->insert(
           
    [
        "link" => "https://www.facebook.com/?locale=fr_FR",
        "icon" => "uil uil-facebook-f"
    ],
    [
        "link" => "https://github.com/",
        "icon" => "uil uil-github"
    ],
    [
        "link" => "https://www.youtube.com/",
        "icon" => "uil uil-youtube"
    ],
    [
        "link" => "https://www.instagram.com/",
        "icon" => "uil uil-instagram"
    ]


    );
    }
}
