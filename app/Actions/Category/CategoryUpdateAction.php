<?php
namespace App\Actions\Category;

use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;

class CategoryUpdateAction {

    public function __construct(
        public CategoryRepositoryInterface $categoryRepository
    ) {}

    /**
     * Update the specified category in storage.
     *
     * @param int $id The ID of the category to update.
     * @param array $data The validated request data containing the 'name' and 'image' fields.
     * @return void
     */
    public function handle( $id, array $data) {
        $this->categoryRepository->update($id, $data);
    }
}