<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        Customer::create(['name' => 'Wakwaw', 'email' => 'wakwaw@gmail.com.com']);
        Customer::create(['name' => 'Awokawok', 'email' => 'awokawok@gmail.com.com']);
        Customer::create(['name' => 'p Mabar', 'email' => 'p123@gmail.com.com']);
    }
}
