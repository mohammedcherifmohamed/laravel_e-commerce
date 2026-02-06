<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ImageModel;
use App\Models\ProductModel;

class ImageSeeder extends Seeder
{
    public function run(): void
    {
        ImageModel::truncate();

        $mouse = ProductModel::where('name', 'Gaming Mouse X')->first();
        $keyboard = ProductModel::where('name', 'Mechanical Keyboard Pro')->first();

        ImageModel::insert([
            [
                'product_id' => $mouse->id,
                'image_path' => 'products/mouse_1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => $mouse->id,
                'image_path' => 'products/mouse_2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => $keyboard->id,
                'image_path' => 'products/keyboard_1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
