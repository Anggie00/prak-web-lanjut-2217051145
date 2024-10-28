<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Ti',
                'email' => 'ti@example.com',
                'password' => Hash::make('password'), // Menggunakan Hash untuk password
                'jurusan' => 'Teknik Informatika',
                'semester' => 5,
            ],
            [
                'name' => 'User 2',
                'email' => 'user2@example.com',
                'password' => Hash::make('password'), 
                'jurusan' => 'Sistem Informasi',
                'semester' => 3,
            ],
            [
                'name' => 'User 3',
                'email' => 'user3@example.com',
                'password' => Hash::make('password'), 
                'jurusan' => 'Teknik Komputer',
                'semester' => 7,
            ],
        ];

        // Insert data ke tabel users
        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
