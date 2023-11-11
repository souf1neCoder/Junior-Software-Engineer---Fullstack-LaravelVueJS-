<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductsRepository;
use Illuminate\Http\UploadedFile;

class StoreProductService
{
    public function __construct(public ProductsRepository $productsRepository)
    {
    }

    public function store($request): Product
    {
        $data = $request->validated();
        $image_path = $request->hasFile('image') ? $this->uploadImage($request->file('image')) : null;
        $data['image'] = $image_path;

        return $this->productsRepository->store($data);
    }

    public function uploadImage(UploadedFile $image): string
    {
        $path = $image->store('public/products/images');

        return $path;
    }
}
