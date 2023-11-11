<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all()->pluck('id');
        Product::factory(10)->create()->each(function ($product) use ($categories) {
            $product->categories()->attach($categories->random());
        });
    }
}
