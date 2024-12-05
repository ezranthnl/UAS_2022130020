<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;


class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            ['nama' => 'Americano', 'harga' => 25000, 'outlet_id' => 1, 'gambar' => 'storage/americano.jpeg'],
            ['nama' => 'Cappuccino', 'harga' => 25000, 'outlet_id' => 1, 'gambar' => 'storage/cappucino.jpg'],
            ['nama' => 'Kopi Kisah Manis', 'harga' => 28000, 'outlet_id' => 1,'gambar' => 'storage/kopikisman.jpeg'],
            ['nama' => 'Kopi Kisah Asmara', 'harga' => 29000, 'outlet_id' => 1,'gambar' => 'storage/asmara.jpeg'],
            ['nama' => 'Goguma Ppang', 'harga' => 20000, 'outlet_id' => 1,'gambar' => 'storage/goguma.jpg'],

            ['nama' => 'Americano', 'harga' => 25000, 'outlet_id' => 2, 'gambar' => 'storage/americano.jpeg'],
            ['nama' => 'Cappuccino', 'harga' => 25000, 'outlet_id' => 2,'gambar' => 'storage/cappucino.jpg'],
            ['nama' => 'Kopi Kisah Manis', 'harga' => 28000, 'outlet_id' => 2,'gambar' => 'storage/kopikisman.jpeg'],
            ['nama' => 'Kopi Kisah Asmara', 'harga' => 30000, 'outlet_id' => 2,'gambar' => 'storage/asmara.jpeg'],
            ['nama' => 'Goguma Ppang', 'harga' => 22000, 'outlet_id' => 2,'gambar' => 'storage/goguma.jpg'],
            ['nama' => 'Nasi Goreng Kampung', 'harga' => 35000, 'outlet_id' => 2,'gambar' => 'storage/kampung.jpg'],
            ['nama' => 'Nasi Goreng Kisah Manis', 'harga' => 38000, 'outlet_id' => 2,'gambar' => 'storage/nasgorkisman.jpg'],

            ['nama' => 'Americano', 'harga' => 25000, 'outlet_id' => 3, 'gambar' => 'storage/americano.jpeg'],
            ['nama' => 'Cappuccino', 'harga' => 25000, 'outlet_id' => 3,'gambar' => 'storage/cappucino.jpg'],
            ['nama' => 'Kopi Kisah Manis', 'harga' => 28000, 'outlet_id' => 3,'gambar' => 'storage/kopikisman.jpeg'],
            ['nama' => 'Kopi Kisah Asmara', 'harga' => 30000, 'outlet_id' => 3,'gambar' => 'storage/asmara.jpeg'],
            ['nama' => 'Goguma Ppang', 'harga' => 22000, 'outlet_id' => 3,'gambar' => 'storage/goguma.jpg'],
            ['nama' => 'Nasi Goreng Kampung', 'harga' => 35000, 'outlet_id' => 3,'gambar' => 'storage/kampung.jpg'],
            ['nama' => 'Nasi Goreng Kisah Manis', 'harga' => 38000, 'outlet_id' => 3,'gambar' => 'storage/nasgorkisman.jpg'],
            ['nama' => 'Cheese Cake Strawberry', 'harga' => 35000, 'outlet_id' => 3,'gambar' => 'storage/cake.jpg'],
            ['nama' => 'Cheese Cake Blueberry', 'harga' => 38000, 'outlet_id' => 3,'gambar' => 'storage/cake.jpg'],
        ];
        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
