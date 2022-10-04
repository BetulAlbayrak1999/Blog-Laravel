<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Post;
use \App\Models\Category;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*User::truncate();
        Category::truncate();
        Post::truncate();*/

         $user = User::factory(3)->create();
         $category = Category::factory(4)->create();
         $post = Post::factory(10)->create([
             'user_id' => 1,
             'category_id' => 2,
         ]);

    }
}
