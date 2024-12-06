<?php
namespace App\Actions\Category;

use App\Repositories\Contracts\CategoryRepositoryInterface;

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
    public function handle(int $id, array $data) : void {
        $this->categoryRepository->update($id, $data);
    }
}