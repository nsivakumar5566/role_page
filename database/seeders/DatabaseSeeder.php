<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
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
        $users = [
            [
                'name' => 'P',
                'email' => 'p@sms.com',
                'password' => Hash::make('1994'),
                'role' => 'Principle',
            ],
            [
                'name' => 'T',
                'email' => 't@sms.com',
                'password' => Hash::make('1994'),
                'role' => 'Teacher',
            ],
            [
                'name' => 'S',
                'email' => 's@sms.com',
                'password' => Hash::make('1994'),
                'role' => 'Student',
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'role' => $user['role'],
            ]);
        }
    }
}
