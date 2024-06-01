<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            //radomize the category_id
            'category_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 1, 100), // '2' is the number of decimals, '1' is the minimum value, '100' is the maximum value
            'slug' => $this->faker->slug,
            'image' => 'https://via.placeholder.com/150',
            'description' => $this->faker->paragraph,
            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->sentence,
            'meta_keywords' => $this->faker->words(3, true),
            'order_by' => $this->faker->randomDigit,
            'status' => true,
        ];
    }
}
