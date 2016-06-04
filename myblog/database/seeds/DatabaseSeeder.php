<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        // $this->call(UserTableSeeder::class);
        DB::table('article')->insert([
            'article_title' => str_random(10),
            'article_info' => str_random(20),
            'article_content' => str_random(100),
        ]);
    }
}
