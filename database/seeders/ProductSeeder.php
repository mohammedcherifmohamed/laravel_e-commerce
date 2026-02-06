<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        ProductModel::truncate();

        $gaming = CategoryModel::where('name', 'Gaming')->first();
        $accessories = CategoryModel::where('name', 'Accessories')->first();

        ProductModel::insert([
            [
                'name' => 'Gaming Mouse X',
                'description' => 'RGB gaming mouse with high precision sensor',
                'price' => 49.99,
                'category_id' => $gaming->id,
                'quantity' => 25,
                'status' => 'in_stock',
                'rating' => 4.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mechanical Keyboard Pro',
                'description' => 'Mechanical keyboard with blue switches',
                'price' => 89.99,
                'category_id' => $gaming->id,
                'quantity' => 10,
                'status' => 'in_stock',
                'rating' => 4.7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'USB-C Hub',
                'description' => '7-in-1 USB-C hub for laptops',
                'price' => 29.99,
                'category_id' => $accessories->id,
                'quantity' => 0,
                'status' => 'out_of_stock',
                'rating' => 4.2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
