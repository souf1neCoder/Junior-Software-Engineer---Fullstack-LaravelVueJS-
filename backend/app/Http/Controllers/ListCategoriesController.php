<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Log;
use App\Services\ListCategoriesService;

class ListCategoriesController extends Controller
{
    use HttpResponses;
    public function __invoke(ListCategoriesService $listCategoriesService)
    {
        try {
            $result = $listCategoriesService->get();
            return $this->handleResponse($result,'Categories Returned Successfully!');
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return $this->handleError(['Something went wrong!']);
        }
    }
}
