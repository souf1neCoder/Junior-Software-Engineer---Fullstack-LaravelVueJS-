<?php

namespace App\Http\Controllers;

use App\Services\ListCategoriesService;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ListCategoriesController extends Controller
{
    use HttpResponses;

    public function __construct(public ListCategoriesService $listCategoriesService)
    {
    }

    public function __invoke(): JsonResponse
    {
        try {
            $result = $this->listCategoriesService->get();

            return $this->handleResponse($result, 'Categories Returned Successfully!');
        } catch (\Throwable $e) {
            Log::error($e->getMessage());

            return $this->handleError(['Something went wrong!']);
        }
    }
}
