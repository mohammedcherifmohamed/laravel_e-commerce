<?php

namespace Database\Factories;

use App\Models\ImageModel;
use App\Models\ProductModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageModelFactory extends Factory
{
    protected $model = ImageModel::class;

    public function definition(): array
    {
        return [
            'product_id' => ProductModel::factory(),
            'image_path' => 'products/mouse_1.jpg', // Using a default image as requested
        ];
    }
}
