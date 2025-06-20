<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('services')->insert(
            [

                "name"=>"Backend Developer",
                "icon"=>"fas fa-pencil-alt",
                "description"=>"Sapiente odit ut ipsam neque dolorum et. Officiis error dicta pariatur quidem. Saepe dignissimos et at error dolores asperiores. Earum id sed ratione ducimus enim voluptate praesentium.",
            ],
            [

                "name"=>"Backend ",
                "icon"=>"fas fa-pencil-alt1111",
                "description"=>"Sapiente odit ut ipsam neque dolorum et. Officiis error dicta pariatur quidem. Saepe dignissimos et at error dolores asperiores. Earum id sed ratione ducimus enim voluptate praesentium.",
            ],
            [

                "name"=>"Developer",
                "icon"=>"fas fa-pencil-alt222",
                "description"=>"Sapiente odit ut ipsam neque dolorum et. Officiis error dicta pariatur quidem. Saepe dignissimos et at error dolores asperiores. Earum id sed ratione ducimus enim voluptate praesentium.",
            ],
            
            );
    }
}
