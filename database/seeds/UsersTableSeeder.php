<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Andrey',
            'email' => 'andrey@test.com',
            'password' => bcrypt('secret'),
            'type' => 'admin'
        ]);
        
        User::create([
            'name' => 'Alice',
            'email' => 'alice@test.com',
            'password' => bcrypt('secret'),
            'type' => 'user'
        ]);
        
        User::create([
            'name' => 'Bob',
            'email' => 'bob@test.com',
            'password' => bcrypt('secret'),
            'type' => 'user'
        ]);
        
        User::create([
            'name' => 'Carol',
            'email' => 'carol@test.com',
            'password' => bcrypt('secret'),
            'type' => 'user'
        ]);
    }
}
