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
                'slug' => 'gaming-mouse-x',
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
                'slug' => 'mechanical-keyboard-pro',
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
                'slug' => 'usb-c-hub',
                'description' => '7-in-1 USB-C hub for laptops',
                'price' => 29.99,
                'category_id' => $accessories->id,
                'quantity' => 0,
                'status' => 'out_of_stock',
                'rating' => 4.2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
                [
        'name' => 'Mechanical Keyboard Pro',
        'slug' => 'mechanical-keyboard-pro',
        'description' => 'RGB mechanical keyboard with blue switches',
        'price' => 89.99,
        'category_id' => $gaming->id,
        'quantity' => 15,
        'status' => 'in_stock',
        'rating' => 4.7,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Gaming Headset Z',
        'slug' => 'gaming-headset-z',
        'description' => 'Surround sound gaming headset with noise cancellation',
        'price' => 69.99,
        'category_id' => $gaming->id,
        'quantity' => 30,
        'status' => 'in_stock',
        'rating' => 4.4,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Gaming Mouse Pad XL',
        'slug' => 'gaming-mouse-pad-xl',
        'description' => 'Extended mouse pad with anti-slip base',
        'price' => 19.99,
        'category_id' => $gaming->id,
        'quantity' => 40,
        'status' => 'in_stock',
        'rating' => 4.3,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Wireless Gaming Controller',
        'slug' => 'wireless-gaming-controller',
        'description' => 'Bluetooth wireless controller compatible with PC and console',
        'price' => 59.99,
        'category_id' => $gaming->id,
        'quantity' => 20,
        'status' => 'in_stock',
        'rating' => 4.5,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Gaming Chair Comfort X',
        'slug' => 'gaming-chair-comfort-x',
        'description' => 'Ergonomic gaming chair with lumbar support',
        'price' => 199.99,
        'category_id' => $gaming->id,
        'quantity' => 8,
        'status' => 'in_stock',
        'rating' => 4.6,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Streaming Microphone',
        'slug' => 'streaming-microphone',
        'description' => 'USB condenser microphone for streaming and gaming',
        'price' => 79.99,
        'category_id' => $gaming->id,
        'quantity' => 18,
        'status' => 'in_stock',
        'rating' => 4.4,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'slug' => 'rgb-gaming-desk-lamp',
        'name' => 'RGB Gaming Desk Lamp',
        'description' => 'Ambient RGB lamp for gaming setup',
        'price' => 34.99,
        'category_id' => $gaming->id,
        'quantity' => 22,
        'status' => 'in_stock',
        'rating' => 4.2,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'slug' => 'high-speed-gaming-router',
        'name' => 'High-Speed Gaming Router',
     
        'description' => 'Low-latency router optimized for online gaming',
        'price' => 129.99,
        'category_id' => $gaming->id,
        'quantity' => 10,
        'status' => 'in_stock',
        'rating' => 4.6,
        'created_at' => now(),
        'updated_at' => now(),
    ],

        ]);
    }
}
