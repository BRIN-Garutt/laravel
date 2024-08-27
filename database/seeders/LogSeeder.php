<?php

namespace Database\Seeders;

use App\Models\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //buat seeder untuk memasukkan data ke database
        $now = Carbon::now('Asia/Jakarta');
        Log::create([
            'suhu' => 25.5,
            'kelembapan' => 60.5,
            'tanggal' => $now->format('Y-m-d'), // Simpan dalam format MySQL (YYYY-MM-DD)
            'hari' => $now->locale('id')->translatedFormat('l'),
            'waktu' => $now->format('H:i:s'),
        ]);
    }
}
