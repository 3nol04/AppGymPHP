<?php

namespace Database\Seeders;

use App\Models\Kelasharga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HargakelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $harga=[
            ['nama_kelas' => 'Pagi',
            'price' => 100000],  
            [   'nama_kelas' => 'Siang',
                'price' => 150000],
            [   'nama_kelas' => 'Sore',
                'price' => 200000]];
        foreach ($harga as $hargakelas) {
            Kelasharga::create($hargakelas);
        }
    }
}
