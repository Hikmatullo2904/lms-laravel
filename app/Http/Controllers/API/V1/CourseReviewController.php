<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\CourseReview\AddCourseReviewAction;
use App\Actions\CourseReview\GetCourseReviewsAction;
use App\Actions\CourseReview\UpdateCourseReviewAction;
use App\Http\Controllers\API\V1\Controller;
use App\Http\Requests\CourseReviewRequest;
use App\Http\Resources\ApiResponse;
use App\Http\Resources\CourseReviewCollection;
use Illuminate\Support\Facades\Auth;

class CourseReviewController extends Controller
{

    public function __construct(
        public GetCourseReviewsAction $getCourseReviewsAction,
        public AddCourseReviewAction $addCourseReviewAction,
        public UpdateCourseReviewAction $updateCourseReviewAction
    ) {
    }

    /**
     * Store a newly created course review in storage.
     *
     * @param  \App\Http\Requests\CourseReviewRequest  $request
     * @return \App\Http\Resources\ApiResponse
     */
    public function create(CourseReviewRequest $request): ApiResponse
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        $this->addCourseReviewAction->handle($validated);
        return new ApiResponse(null);
    }

    public function getCourseReviews(int $id, int $page = 1, int $size = 10)
    {
        $paginated = $this->getCourseReviewsAction->handle($id, $page, $size);
        return new CourseReviewCollection($paginated->items());
    }
}
