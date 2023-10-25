<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Services\ListProductsService;
use App\Traits\HttpResponses;

class ListProductsController extends Controller
{
    use HttpResponses;
    /**
     * Handle the incoming request.
     */
    public function __invoke(ListProductsService $listProductService,$categoryId=0)
    {
        try {
            $result = $listProductService->get($categoryId);
            return $this->handleResponse($result,'Products Returned Successfully!');
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return $this->handleError(['Something went wrong!']);
        }
    }
}
