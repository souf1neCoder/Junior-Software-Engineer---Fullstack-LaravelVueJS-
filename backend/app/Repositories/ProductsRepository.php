<?php
namespace App\Repositories;

use App\Models\Product;

class ProductsRepository{
    public function store($data){
        $product = Product::create($data);
        $product->categories()->attach($data['categories']);
        return $product;
    }
    //
    public function get($categoryId){
        if($categoryId){
            return Product::with('categories')->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('categories.id', $categoryId);
            })->get();
        }
        return Product::with('categories')->get();
    }
}
