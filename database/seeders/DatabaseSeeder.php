<?php

namespace Database\Seeders;

use App\Models\CategoryModel;
use App\Models\ImageModel;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductModel;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        // Ensure Categories exist
        $this->call([
            CategorySeeder::class,
        ]);

        // Create 100 Products, each with 1 Image
        ProductModel::factory(100)->create()->each(function ($product) {
            ImageModel::factory()->create([
                'product_id' => $product->id,
                'image_path' => 'products/mouse_1.jpg', // Use same image for all
            ]);
        });

        // Create 100 Users
        User::factory(100)->create()->each(function ($user) {
            // Create 10 Orders for each User
            Order::factory(10)->create([
                'user_id' => $user->id,
            ])->each(function ($order) {
                // Create random OrderItems for each Order
                OrderItem::factory(rand(1, 5))->create([
                    'order_id' => $order->id,
                ]);
            });
        });

        Schema::enableForeignKeyConstraints();
    }
}
