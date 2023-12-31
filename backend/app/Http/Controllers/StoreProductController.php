<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Services\StoreProductService;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class StoreProductController extends Controller
{
    use HttpResponses;

    public function __construct(public StoreProductService $storeProductService)
    {
    }

    public function __invoke(StoreProductRequest $request): JsonResponse
    {
        try {
            $result = $this->storeProductService->store($request);

            return $this->handleResponse($result, 'Product Created Successfully!');
        } catch (\Throwable $e) {
            Log::error($e->getMessage());

            return $this->handleError(['Something went wrong!']);
        }
    }
}
