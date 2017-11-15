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
            'password' => crypt('secret', '$2a$07$thissaltisreallyhardtoguess$'),
            'type' => 'admin'
        ]);
        
        User::create([
            'name' => 'Alice',
            'email' => 'alice@test.com',
            'password' => crypt('secret', '$2a$07$thissaltisreallyhardtoguess$'),
            'type' => 'user'
        ]);
        
        User::create([
            'name' => 'Bob',
            'email' => 'bob@test.com',
            'password' => crypt('secret', '$2a$07$thissaltisreallyhardtoguess$'),
            'type' => 'user'
        ]);
        
        User::create([
            'name' => 'Carol',
            'email' => 'carol@test.com',
            'password' => crypt('secret', '$2a$07$thissaltisreallyhardtoguess$'),
            'type' => 'user'
        ]);
    }
}
