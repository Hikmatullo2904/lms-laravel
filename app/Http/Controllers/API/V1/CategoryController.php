<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\Category\CategoryCreateAction;
use App\Actions\Category\CategoryGetAllAction;
use App\Actions\Category\CategoryUpdateAction;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\ApiResponse;
use App\Http\Resources\CategoryCollection;

class CategoryController extends Controller
{

    public function __construct(
        public CategoryCreateAction $categoryCreateAction,
        public CategoryGetAllAction $categoryGetAllAction,
        public CategoryUpdateAction $categoryUpdateAction
    ){}

    /**
     * Create a new category in the database.
     *
     * @param \App\Http\Requests\CategoryRequest $request
     * @return \App\Http\Resources\ApiResponse
     */
    public function create(CategoryRequest $request) {
        $this->categoryCreateAction->handle($request->validated());
        return new ApiResponse(null);
    }

    /**
     * Get all categories
     *
     * @return \App\Http\Resources\CategoryCollection
     */
    public function index() {
        return new CategoryCollection($this->categoryGetAllAction->handle());
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @param  int  $id
     * @return \App\Http\Resources\ApiResponse
     */
    public function update( $id, CategoryRequest $request) : ApiResponse {
        $this->categoryUpdateAction->handle($id, $request->validated());
        return new ApiResponse(null);
    }
}
