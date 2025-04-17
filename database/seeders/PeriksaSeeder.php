<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Periksa;
use Carbon\Carbon;

class PeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Periksa::create([
            'id_pasien' => 1,
            'id_dokter' => 2,
            'tgl_periksa' => Carbon::now(),
            'catatan' => 'Pasien mengalami sakit kepala dan demam.',
            'biaya_periksa' => 50000,
        ]);

        Periksa::create([
            'id_pasien' => 1,
            'id_dokter' => 2,
            'tgl_periksa' => Carbon::now()->subDays(2),
            'catatan' => 'Pasien mengalami nyeri tenggorokan dan batuk.',
            'biaya_periksa' => 75000,
        ]);
    }
}
