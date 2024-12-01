<?php
namespace App\Actions\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryUpdateAction {
    public function handle( $id, array $request) {
        $category = Category::findOrFail($id);
        $url = $category->image;
        if($request['image']) {
            $url = Storage::disk('public')->putFile('categories', $request['image']);
        }

        $category->update([
            'name' => $request['name'],
            'image' => $url
        ]);
        
    }
}