<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Outlet;


class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Outlet::create([
            'nama' => 'Kopi Kisah Manis Abdulrahman Saleh No. 56',
            'foto' => 'storage/absal1.jpg',  // Gambar outlet
            'alamat' => 'Jl. Abdulrahman Saleh No. 56',
        ]);

        Outlet::create([
            'nama' => 'Kopi Kisah Manis Sunda No. 65',
            'foto' => 'storage/app/public/sunda1.jpg',
            'alamat' => 'Jl. Sunda No. 65',
        ]);

        Outlet::create([
            'nama' => 'Kopi Kisah Manis Dago Ir. H. Djuanda No. 98',
            'foto' => 'storage/dago1.jpg',
            'alamat' => 'Jl. Dago No. 98',
        ]);
    }
}
