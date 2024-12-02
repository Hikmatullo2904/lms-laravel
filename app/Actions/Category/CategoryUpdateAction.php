<?php
namespace App\Actions\Category;

use App\Models\Category;

class CategoryUpdateAction {


    /**
     * Update the specified category in storage.
     *
     * @param int $id The ID of the category to update.
     * @param array $request The validated request data containing the 'name' and 'image' fields.
     * @return void
     */
    public function handle( $id, array $request) {
        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request['name'],
            'image' => $request['image']
        ]);
        
    }
}