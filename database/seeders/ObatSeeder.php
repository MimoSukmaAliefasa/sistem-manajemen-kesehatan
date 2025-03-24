<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\Obat;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Obat::create([
            'nama_obat' => 'Paracetamol',
            'jenis_obat' => 'Tablet',
            'harga_obat' => 5000,
            'stok_obat' => 100
        ]);

        Obat::create([
            'nama_obat' => 'Amoxilin',
            'jenis_obat' => 'Kapsul',
            'harga_obat' => 10000,
            'stok_obat' => 50
        ]);

        Obat::create([
            'nama_obat' => 'Betadine',
            'jenis_obat' => 'Cair',
            'harga_obat' => 15000,
            'stok_obat' => 30
        ]);
    }
}
