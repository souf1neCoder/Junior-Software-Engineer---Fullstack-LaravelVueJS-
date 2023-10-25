<?php
namespace App\Services;

use App\Repositories\CategoriesRepository;

class ListCategoriesService{
    public function __construct(public CategoriesRepository $categoriesRepository){}
    public function get(){
        return $this->categoriesRepository->get();
    }
}
