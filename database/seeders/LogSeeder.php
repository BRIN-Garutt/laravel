<?php

namespace Database\Seeders;

use App\Models\Log;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Instance Faker untuk menghasilkan data acak
        $faker = Faker::create();

        // Loop untuk memasukkan 11 data acak
        for ($i = 0; $i < 5; $i++) {
            $now = Carbon::now('Asia/Jakarta');

            Log::create([
                'suhu' => $faker->randomFloat(1, 20, 30), // suhu antara 20.0 dan 30.0
                'kelembapan' => $faker->randomFloat(1, 50, 70), // kelembapan antara 50.0 dan 70.0
                'tanggal' => $now->format('Y-m-d'),
                'hari' => $now->locale('id')->translatedFormat('l'),
                'waktu' => $now->format('H:i:s'),
            ]);

            // Tambahkan sedikit jeda waktu untuk membuat waktu inputan lebih bervariasi
            $now->addSeconds($faker->numberBetween(1, 59));
        }
    }
}
