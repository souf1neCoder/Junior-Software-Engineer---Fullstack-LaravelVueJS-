<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics', 'parent_id' => null],
            ['name' => 'Clothing', 'parent_id' => null],
            ['name' => 'Laptops', 'parent_id' => 1],
            ['name' => 'Smartphones', 'parent_id' => 1],
            ['name' => 'Men\'s Clothing', 'parent_id' => 2],
            ['name' => 'Women\'s Clothing', 'parent_id' => 2],
        ];

        Category::insert($categories);
    }
}
