<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define an array of product categories with sample data
        $categories = [
            ['name' => "Men's Office Wear", 'slug' => 'mens-office-wear', 'description' => 'Elevate Your Office Look'],
            ['name' => "Women's Office Wear", 'slug' => 'womens-office-wear', 'description' => 'Sophisticated Work Attire'],
            ['name' => 'Denims', 'slug' => 'denims', 'description' => 'Classic Denim Styles'],
            ['name' => 'Crop Tops', 'slug' => 'crop-tops', 'description' => 'Trendy and Versatile'],
            ['name' => 'Frocks', 'slug' => 'frocks', 'description' => 'Chic and Feminine'],
            ['name' => 'Party Frocks', 'slug' => 'party-frocks', 'description' => 'Get Party-Ready'],
            ['name' => 'Swimwear', 'slug' => 'swimwear', 'description' => 'Stylish Beach Essentials'],
            ['name' => 'Nightdress', 'slug' => 'nightdress', 'description' => 'Comfortable Nightwear'],
            ['name' => 'Shirts', 'slug' => 'shirts', 'description' => 'Versatile Wardrobe Staple'],
            ['name' => 'T-Shirts Oversized', 'slug' => 't-shirts-oversized', 'description' => 'Relaxed Casual Wear'],
        ];

        // Insert each category into the database
        foreach ($categories as $category) {
            ProductCategory::create($category);
        }
    }
}
