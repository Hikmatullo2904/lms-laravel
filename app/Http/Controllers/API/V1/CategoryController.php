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

    public function create(CategoryRequest $request) {
        $this->categoryCreateAction->handle($request->validated());
        return new ApiResponse(null);
    }

    public function index() {
        return new CategoryCollection($this->categoryGetAllAction->handle());
    }

    public function update($id, CategoryRequest $request) {
        //TODO fix the error
        // echo $request->all();
        // $this->categoryUpdateAction->handle($id, $request->validated());
        // return new ApiResponse(null);
    }
}
