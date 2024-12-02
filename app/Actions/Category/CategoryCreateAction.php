<?php

namespace App\Actions\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryCreateAction {

    
    /**
     * Create a new category and save it to storage.
     * 
     * @param array $request The validated request data containing the 'name' and 'image' fields.
     * @return \App\Models\Category The newly created category.
     */
    public function handle(array $request) {
        $url = null;
        if($request['image']) {
            $url = Storage::disk('public')->putFile('files', $request['image']);
        }

        $category = Category::create([
            'name' => $request['name'],
            'image' => $url
        ]);
        return $category;

    }
}