<?php
namespace App\Repositories;

use App\Models\Category;

class CategoriesRepository{
    public function get(){
        return Category::all();
    }
}
