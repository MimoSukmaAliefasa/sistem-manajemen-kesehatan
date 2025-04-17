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
     */
    public function run(): void
    {
        user::create([
            'name' => 'Dr. Joko',
            'alamat' => 'Jl. Raya No. 1',
            'no_hp' => '081234567890',
            'email' => 'DrJoko@gmail.com',
            'role' => 'dokter',
            'password' => Hash::make('password')
        ]);

        user::create([
            'name' => 'Dr. Kristina',
            'alamat' => 'Jl Raya',
            'no_hp' => '09876665423',
            'email' => 'kristiana@gmail.com',
            'role' => 'dokter',
            'password' => Hash::make('password')
        ]);

        user::create([
            'name' => 'Budi',
            'alamat' => 'Jl. Raya No. 2',
            'no_hp' => '081234567891',
            'email' => 'Budi@gmail.com',
            'role' => 'pasien',
            'password' => Hash::make('password')
        ]);
    }
}
