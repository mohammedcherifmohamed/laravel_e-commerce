<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoryModel;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        CategoryModel::truncate();

        CategoryModel::insert([
            [
                'name' => 'Gaming',
                'description' => 'Gaming accessories and hardware',
                'icon' => 'fa-gamepad',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Accessories',
                'description' => 'Computer and phone accessories',
                'icon' => 'fa-usb',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laptops',
                'description' => 'Portable computers and notebooks',
                'icon' => 'fa-laptop',
                'status' => 'inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
