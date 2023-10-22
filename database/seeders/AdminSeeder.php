<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("admins")->insert([
            [
                "login" => "superAdmin",
                "password" => Hash::make("123"),
                "role" => 1,
            ], [

                "login" => "admin",
                "password" => Hash::make("123"),
                "role" => 0,
            ]
        ]);
    }
}
