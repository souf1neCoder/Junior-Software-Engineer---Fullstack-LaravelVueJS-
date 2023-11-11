<?php

namespace App\Console\Commands;

use App\Repositories\ProductsRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CreateProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:create {name : Product name} {description : Product description} {price : Product price} {categories* : Category IDs} {--image= : Image Src (optional)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Product Creation';

    /**
     * Execute the console command.
     */
    public function handle(ProductsRepository $productsRepository)
    {
        try {
            $name = $this->argument('name');
            $description = $this->argument('description');
            $price = $this->argument('price');
            $imagePath = $this->option('image');
            $categoryIds = $this->argument('categories');
            $data = [
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'image' => $imagePath,
                'categories' => $categoryIds,
            ];
            $product = $productsRepository->store($data);

            $this->info("Product created successfully ($product->name, $product->description, $product->price)");
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            $this->error($th->getMessage());
        }
    }
}
