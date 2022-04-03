<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\post;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        post::insert([
            "image_url"=>"https://unsplash.com/photos/WNoLnJo7tS8",
            "caption"=>"Julion won",
            "user_id"=>1
        ]);
    }
}
