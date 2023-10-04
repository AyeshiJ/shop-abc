<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Product::create([
            'product_name' => 'Carrot',
            'product_category' => 1,
            'product_description' => 'Fresh and Organic',
            'product_price' => 100,
            'availability' => true,
            'quantity' => 10,
        ]);

        Product::create([
            'product_name' => 'Apple',
            'product_category' => 3,
            'product_description' => 'Imported',
            'product_price' => 200,
            'availability' => true,
            'quantity' => 50,
        ]);
    }
}
