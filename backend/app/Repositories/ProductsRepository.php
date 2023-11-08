<?php
namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductsRepository{

    public function store(array $data) : Product{
        $product = Product::create($data);
        $product->categories()->attach($data['categories']);
        return $product;
    }

    public function get(int $categoryId) : Collection{
        if($categoryId){
            return Product::with('categories')->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('categories.id', $categoryId);
            })->get();
        }
        return Product::with('categories')->get();
    }
}
