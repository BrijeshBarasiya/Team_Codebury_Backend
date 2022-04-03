<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'fname' => "parth",
            'lname' => "darji",
            'email' => "parthdarji1912@gmail.com",
            'password' => Hash::make('password'),
            'gender' => "male",
            'department' => "opensource",
            'job' => "trainee",
            'image_url'=>"soon",
            'dob'=>"24.04.2021"

        ]);
    }
}
