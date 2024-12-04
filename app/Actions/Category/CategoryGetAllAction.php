<?php

namespace App\Actions\Category;

use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;

class CategoryGetAllAction {

    
    public function __construct(
        public CategoryRepositoryInterface $categoryRepository
    ) {}

    /**
     * Retrieve all categories from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection|Category[]
     */
    public function handle() {
        return $this->categoryRepository->all();
    }
}