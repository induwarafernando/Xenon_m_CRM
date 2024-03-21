<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 products
        \App\Models\Product::factory(10)->create();


    }
}
