<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                'username' => 'p3b3k',
                'password' => Hash::make('password'),
                'role' => 'p3b3k',
            ],

            [
                'username' => 'marut',
                'password' => Hash::make('password'),
                'role' => 'desa',
                'desa_id' => 1,
            ],
            [
                'username' => 'teratai',
                'password' => Hash::make('password'),
                'role' => 'desa',
                'desa_id' => 2,
            ],
            [
                'username' => 'potim',
                'password' => Hash::make('password'),
                'role' => 'desa',
                'desa_id' => 3,
            ],
            [
                'username' => 'bolangita',
                'password' => Hash::make('password'),
                'role' => 'desa',
                'desa_id' => 4,
            ],
            [
                'username' => 'palopo',
                'password' => Hash::make('password'),
                'role' => 'desa',
                'desa_id' => 5,
            ],
            [
                'username' => 'pohuwato',
                'password' => Hash::make('password'),
                'role' => 'desa',
                'desa_id' => 6,
            ],
            [
                'username' => 'bobilotahu',
                'password' => Hash::make('password'),
                'role' => 'desa',
                'desa_id' => 7,
            ],
            [
                'username' => 'marsel',
                'password' => Hash::make('password'),
                'role' => 'desa',
                'desa_id' => 8,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
