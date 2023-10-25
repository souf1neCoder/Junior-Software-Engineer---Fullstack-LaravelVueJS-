<?php
namespace App\Services;

use App\Repositories\ProductsRepository;

class StoreProductService{

    public function __construct(public ProductsRepository $productsRepository){}

    public function store($request){
        $data = $request->validated();
        $image_path = $request->hasFile('image') ? $this->uploadImage($request->file('image')) : null;
        $data['image'] = $image_path;
        return $this->productsRepository->store($data);
    }

    public function uploadImage($image){
        $path = $image->store('public/products/images');
        return $path;
    }
}
