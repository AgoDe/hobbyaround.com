<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //User::factory(100)->create();

         /*User::factory()->create([
             'username' => 'test',
             'email' => 'test@gmail.com',
             'password' => 'asdasd',
         ]);*/

         //Article::factory(100)->create();
         Comment::factory(100)->create();

    }
}
