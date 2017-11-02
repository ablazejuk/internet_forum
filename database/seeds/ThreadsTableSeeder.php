<?php

use Illuminate\Database\Seeder;
use App\Thread;

class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Thread::create([
            'user_id' => 1,
            'title' => 'Welcome',
            'description' => 'This is the <b>welcome </b>thread. New members may present themselves here.',
        ]);
    }
}
