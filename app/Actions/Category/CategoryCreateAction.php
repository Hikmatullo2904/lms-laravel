<?php

namespace App\Actions\Category;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryCreateAction {

    public function __construct(
        public CategoryRepositoryInterface $categoryRepository
    ){}
    
    /**
     * Create a new category and save it to storage.
     * 
     * @param array $request The validated request data containing the 'name' and 'image' fields.
     * @return \App\Models\Category The newly created category.
     */
    public function handle(array $request ) : Category {        

        $category = Category::create([
            'name' => $request['name'],
            'image' => $request['image']
        ]);
        return $category;

    }
}