<?php

namespace App\Actions\Category;

use App\Models\Category;

class CategoryGetAllAction {

    
    /**
     * Retrieve all categories from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection|Category[]
     */
    public function handle() {
        return Category::all();
    }
}