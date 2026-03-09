<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Admin', 'email' => 'admin@mail.com', 'role' => 'admin'],
            ['name' => 'Guru',  'email' => 'guru@mail.com',  'role' => 'guru'],
            ['name' => 'Siswa', 'email' => 'siswa@mail.com', 'role' => 'siswa'],
        ];

        foreach ($users as $u) {
            // ✅ Buat user hanya jika email belum ada
            User::updateOrCreate(
                ['email' => $u['email']],
                [
                    'name' => $u['name'],
                    'password' => Hash::make('12345678'),
                    'role' => $u['role'],
                ]
            );
        }
    }
}