<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\CourseSection\AddCourseSectionAction;
use App\Actions\CourseSection\UpdateCourseSectionAction;
use App\Http\Requests\CourseSectionRequest;
use App\Http\Resources\ApiResponse;

class CourseSectionController extends Controller
{

    public function __construct(
        public AddCourseSectionAction $addCourseSectionAction,
        public UpdateCourseSectionAction $updateCourseSectionAction
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

    /**
     * Updates an existing course section.
     *
     * @param int $id The ID of the course section to update.
     * @param CourseSectionRequest $request The request containing the validated course section data.
     * @return ApiResponse
     */
    public function update($id, CourseSectionRequest $request) {
        $this->updateCourseSectionAction->handle($id, $request->validated());
        return new ApiResponse(null);
    }

}