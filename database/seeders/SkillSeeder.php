<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           DB::table('skills')->insert(
            [

                "name"=>"php",
                "proficiency"=>"34",
                "service_id"=>"6",
            ],
            [

                "name"=>"python",
                "proficiency"=>"38",
                "service_id"=>"9",
            ],
            [

                "name"=>"js",
                "proficiency"=>"37",
                "service_id"=>"11",
            ],
         
            
            );
    }
}
