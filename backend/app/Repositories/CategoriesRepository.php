<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoriesRepository
{
    public function get(): Collection
    {
        return Category::all();
    }
}
