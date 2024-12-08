<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create(['name' => 'Mug', 'description' => 'KopiKisahManis Mug', 'price' => 50000]);
        Product::create(['name' => 'T-Shirt', 'description' => 'KopiKisahManis T-Shirt', 'price' => 100000]);
        Product::create(['name' => 'Tote Bag', 'description' => 'KopiKisahManis Tote Bag', 'price' => 30000]);
    }
}
