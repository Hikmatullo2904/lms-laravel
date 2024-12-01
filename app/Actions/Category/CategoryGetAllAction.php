<?php

namespace App\Actions\Category;

use App\Models\Category;

class CategoryGetAllAction {
    public function handle() {
        return Category::all();
    }
}