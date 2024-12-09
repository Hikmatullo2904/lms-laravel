<?php

namespace App\Actions\Category;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CategoryGetAllAction {

    
    public function __construct(
        public CategoryRepositoryInterface $categoryRepository
    ) {}

    /**
     * Retrieve all categories from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection|Category[]
     */
    public function handle() : Collection {
        return $this->categoryRepository->all();
    }
}