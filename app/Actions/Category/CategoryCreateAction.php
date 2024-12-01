<?php

namespace App\Actions\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryCreateAction {

    public function handle(array $request) {
        $url = null;
        if($request['image']) {
            $url = Storage::disk('public')->putFile('categories', $request['image']);
        }

        $category = Category::create([
            'name' => $request['name'],
            'image' => $url
        ]);
        return $category;

    }
}