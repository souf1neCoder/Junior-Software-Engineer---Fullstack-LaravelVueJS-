<?php

namespace App\Services;

use App\Repositories\ProductsRepository;
use Illuminate\Database\Eloquent\Collection;

class ListProductsService
{
    public function __construct(public ProductsRepository $productsRepository)
    {
    }

    public function get(int $categoryId): Collection
    {
        $products = $this->productsRepository->get($categoryId);

        return $this->generateBase64ForProductImage($products);
    }

    public function generateBase64ForProductImage(Collection $products): Collection
    {
        // if image is not null && exists in storage => base64 (web interface)
        // if image is not null && !exists in storage => src url (cmd interface)
        return $products->map(function ($product) {
            if (! is_null($product->image)) {
                $path = storage_path('app/').$product->image;
                if (file_exists($path)) {
                    $data = file_get_contents($path);
                    $ext = pathinfo($path, PATHINFO_EXTENSION);
                    $applicationType = 'image/'.$ext;
                    $base64 = 'data:'.$applicationType.';base64,'.base64_encode($data);
                    $product->image = $base64;
                }
            }

            return $product;
        });
    }
}
