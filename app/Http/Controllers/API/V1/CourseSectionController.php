<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\CourseSection\AddCourseSectionAction;
use App\Http\Requests\CourseSectionRequest;
use App\Http\Resources\ApiResponse;

class CourseSectionController extends Controller
{

    public function __construct(
        public AddCourseSectionAction $addCourseSectionAction
    ) {}

    /**
     * Creates a new course section.
     *
     * @param CourseSectionRequest $request
     * @return ApiResponse
     */
    public function create(CourseSectionRequest $request) {
        $this->addCourseSectionAction->handle($request->validated());
        return new ApiResponse(null);
    }
}