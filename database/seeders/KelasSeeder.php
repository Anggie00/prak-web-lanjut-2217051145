<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas; // Pastikan model Kelas diimport

class KelasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'A',
            'B',
            'C',
            'D',
        ];

        foreach ($data as $kelas) {
            Kelas::create([
                'nama_kelas' => $kelas,
            ]);
        }
    }
}