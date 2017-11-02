<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'user_id' => 2,
            'thread_id' => 1,
            'message' => 'Hi!',
        ]);
        
        Post::create([
            'user_id' => 3,
            'thread_id' => 1,
            'message' => '<i>Hey!</i>',
        ]);
        
        Post::create([
            'user_id' => 4,
            'thread_id' => 1,
            'message' => '<u>Hello!</u>',
        ]);
    }
}
