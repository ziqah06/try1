<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //*utk create brapa byak data
        factory(App\Post::class, 100000)->create(); 
    }
}
