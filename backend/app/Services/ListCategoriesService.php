<?php
namespace App\Services;

use App\Repositories\CategoriesRepository;
use Illuminate\Database\Eloquent\Collection;

class ListCategoriesService{

    public function __construct(public CategoriesRepository $categoriesRepository){}

    public function get() : Collection{
        return $this->categoriesRepository->get();
    }
}
