<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Services\StoreProductService;
use App\Http\Requests\StoreProductRequest;
use App\Traits\HttpResponses;

class StoreProductController extends Controller
{
    use HttpResponses;
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreProductRequest $request,StoreProductService $storeProductService)
    {
        try {
            $result = $storeProductService->store($request);
            return $this->handleResponse($result,'Product Created Successfully!');
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return $this->handleError(['Something went wrong!']);
        }
    }
}
