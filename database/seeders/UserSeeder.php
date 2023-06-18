<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            ['username' => 'p3b3k', 'password' => Hash::make('password'), 'role' => 'p3b3k']
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
