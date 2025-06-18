<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('medias')->insert(
            [
               "name"=>"charnelle kengne",
                "email"=>"charnelle@kengne",
                "email_verified_at"=>"charnelle@kengne",
                "password"=>"qwert12345",
                "role"=>"user",
            ]
            );
    }
}
