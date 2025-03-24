<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\models\DetailPeriksa;

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
            'jumlah' => 2
        ]);

        DetailPeriksa::create([
            'id_periksa' => 1,
            'id_obat' => 2,
            'jumlah' => 1
        ]);

        DetailPeriksa::create([
            'id_periksa' => 2,
            'id_obat' => 3,
            'jumlah' => 3
        ]);
    }
}
