<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\Course\AddCourseAction;
use App\Actions\Course\GetAllCursesAction;
use App\Actions\Course\GetMentorCoursesAction;
use App\Actions\Course\UpdateCourseAction;
use App\Http\Requests\CourseRequest;
use App\Http\Resources\ApiResponse;
use App\Http\Resources\CourseCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function __construct(
        public AddCourseAction $addCourseAction,
        public UpdateCourseAction $updateCourseAction,
        public GetAllCursesAction $getAllCursesAction,
        public GetMentorCoursesAction $getMentorCoursesAction
    ) {}
    
    /**
     * Store a newly created course in storage.
     *
     * @param  \App\Http\Requests\CourseRequest  $request
     * @return \App\Http\Resources\ApiResponse
     */
    public function create(CourseRequest $request) : ApiResponse {
        $user_id = Auth::id();
        $this->addCourseAction->handle($request->validated(), $user_id);
        return new ApiResponse(null);
    }

    public function index() : CourseCollection {
        return new CourseCollection($this->getAllCursesAction->handle());
    }

    public function update($id, CourseRequest $request) {
        $this->updateCourseAction->handle($id, $request->validated());
        return new ApiResponse(null);
    }

    public function getMentorCourses($id) {
        return new CourseCollection($this->getMentorCoursesAction->handle($id));
    }

    
}
