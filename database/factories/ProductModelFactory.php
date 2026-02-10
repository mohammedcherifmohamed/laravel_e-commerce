<?php

namespace Database\Factories;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductModelFactory extends Factory
{
    protected $model = ProductModel::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->words(3, true);
        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => $this->faker->sentence(10),
            'price' => $this->faker->randomFloat(2, 10, 500),
            'category_id' => CategoryModel::inRandomOrder()->first()?->id ?? CategoryModel::factory(),
            'quantity' => $this->faker->numberBetween(0, 100),
            'status' => $this->faker->randomElement(['in_stock', 'out_of_stock']),
            'rating' => $this->faker->randomFloat(1, 1, 5),
        ];
    }
}
