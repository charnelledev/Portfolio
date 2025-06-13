<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("abouts")->insert([
            [
                "name"=>"charnelle kengne",
                "email"=>"charnelle@kengne",
                "phone"=>"+237655155859",
                "address"=>"baffoussam",
                "description"=>"describe mem",
                "summary"=>"description summary",
                "tagline"=>"description tagline",
                "home_image"=>"no-image.png",
                "banner_image"=>"no-image.png",
                "cv"=>"charnelle",

                

            ]

        ]);
    }
}
