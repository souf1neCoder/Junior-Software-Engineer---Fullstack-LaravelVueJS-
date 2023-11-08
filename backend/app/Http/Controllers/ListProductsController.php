<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Services\ListProductsService;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;

class ListProductsController extends Controller
{
    use HttpResponses;

    public function __construct(public ListProductsService $listProductService){}

    public function __invoke(int $categoryId=0) : JsonResponse
    {
        try {
            $result = $this->listProductService->get($categoryId);
            return $this->handleResponse($result,'Products Returned Successfully!');
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return $this->handleError(['Something went wrong!']);
        }
    }
}
