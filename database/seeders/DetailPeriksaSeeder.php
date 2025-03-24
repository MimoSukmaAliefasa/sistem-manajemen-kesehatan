<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\DetailPeriksa;

class DetailPeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailPeriksa::create([
            'id_periksa' => 1,
            'id_obat' => 1,
            'jumlah_obat' => 2
        ]);

        DetailPeriksa::create([
            'id_periksa' => 1,
            'id_obat' => 2,
            'jumlah_obat' => 1
        ]);

        DetailPeriksa::create([
            'id_periksa' => 2,
            'id_obat' => 3,
            'jumlah_obat' => 3
        ]);
    }
}
