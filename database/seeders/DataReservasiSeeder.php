<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

class DataReservasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tables')->insert([
             ['name' => 'Meja 1', 'capacity' => 4],
             ['name' => 'Meja 2', 'capacity' => 2],
             ['name' => 'Meja 3', 'capacity' => 6],
             ['name' => 'Meja 4', 'capacity' => 8],
             ]);
    }
}

