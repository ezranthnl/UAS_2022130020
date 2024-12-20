<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            AdminSeeder::class,
            OutletSeeder::class,
            DataReservasiSeeder::class,
            MenuSeeder::class,
            PegawaiSeeder::class,
            ProductSeeder::class,
            CustomerSeeder::class
        ]);
        \App\Models\User::factory(10)->create();
    




        // \App\Models\User::factory()->create([
        //     'name' => 'Ezra',
        //     'email' => 'ezra@gmail.com',
        // ]);
    }
}
