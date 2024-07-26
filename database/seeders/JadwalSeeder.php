<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jadwals = [
            ['day' => 'SENIN', 'jam_mulai' => '08:00:00', 'jam_selesai' => '09:00:00'],
            ['day' => 'SELASA', 'jam_mulai' => '09:00:00', 'jam_selesai' => '10:00:00'],
            ['day' => 'RABU', 'jam_mulai' => '10:00:00', 'jam_selesai' => '11:00:00'],
            ['day' => 'KAMIS', 'jam_mulai' => '11:00:00', 'jam_selesai' => '12:00:00'],
            ['day' => 'JUMAT', 'jam_mulai' => '12:00:00', 'jam_selesai' => '13:00:00'],
            ['day' => 'SABTU', 'jam_mulai' => '13:00:00', 'jam_selesai' => '14:00:00'],
            ['day' => 'MINGGU', 'jam_mulai' => '14:00:00', 'jam_selesai' => '15:00:00'],
        ];

        foreach ($jadwals as $jadwal) {
            Jadwal::create($jadwal);
        }
    }
}
