<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pegawai;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Pegawai = [
            ['nama' => 'Arief Syab', 'posisi' => 'barista', 'gambar' => 'storage/masarip.png', 'outlet_id' => 1],
            ['nama' => 'Dzulfi', 'posisi' => 'barista', 'gambar' => 'storage/julpi.png', 'outlet_id' => 1],
            ['nama' => 'Fikri R', 'posisi' => 'barista', 'gambar' => 'storage/toweng.png', 'outlet_id' => 2],
            ['nama' => 'Ica', 'posisi' => 'barista', 'gambar' => 'storage/ica.png', 'outlet_id' => 2],
            ['nama' => 'Bella', 'posisi' => 'barista', 'gambar' => 'storage/bella.jpg', 'outlet_id' => 3],
            ['nama' => 'Alex', 'posisi' => 'barista', 'gambar' => 'storage/ale.jpg', 'outlet_id' => 3],
        ];
        foreach ($Pegawai as $pegawai) {
            Pegawai::create($pegawai);
        }
    }
}
