<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'first_name' => 'Demo',
                'middle_name' => 'User',
                'email' => 'demo@e.com',
                'password' => bcrypt('demo1234'),
                'avatar' => 'chatify-logo.png'
            ],
            [
                'first_name' => 'Munaf A',
                'middle_name' => 'Aqeel',
                'email' => 'info@munafio.com',
                'password' => bcrypt('google11'),
                'avatar' => 'munafio.jpg'
            ],
            [
                'first_name' => 'Abdulmuaz',
                'middle_name' => 'Aqeel',
                'email' => 'devmuaz@e.com',
                'password' => bcrypt('google11'),
                'avatar' => 'devmuaz.jpg'
            ],
        ];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}
