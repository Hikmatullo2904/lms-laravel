<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\Course\AddCourseAction;
use App\Actions\Course\GetAllCursesAction;
use App\Actions\Course\GetCourseAction;
use App\Actions\Course\GetMentorCoursesAction;
use App\Actions\Course\UpdateCourseAction;
use App\Http\Requests\CourseRequest;
use App\Http\Resources\ApiResponse;
use App\Http\Resources\CourseCollection;
use App\Http\Resources\CourseResource;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function __construct(
        public AddCourseAction $addCourseAction,
        public UpdateCourseAction $updateCourseAction,
        public GetAllCursesAction $getAllCursesAction,
        public GetMentorCoursesAction $getMentorCoursesAction,
        public GetCourseAction $getCourseAction
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


    /**
     * Retrieve a list of courses.
     * 
     * @return \App\Http\Resources\CourseCollection
     */
    public function index() : CourseCollection {
        return new CourseCollection($this->getAllCursesAction->handle());
    }


    /**
     * Update the specified course in storage.
     *
     * @param int $id The ID of the course to update.
     * @param \App\Http\Requests\CourseRequest $request The request containing the validated course data.
     * @return \App\Http\Resources\ApiResponse
     */
    public function update($id, CourseRequest $request) {
        $this->updateCourseAction->handle($id, $request->validated());
        return new ApiResponse(null);
    }


    /**
     * Get all courses for a given mentor.
     * 
     * @param int $id The ID of the mentor.
     * @return \App\Http\Resources\CourseCollection
     */
    public function getMentorCourses($id) {
        return new CourseCollection($this->getMentorCoursesAction->handle($id));
    }

    /**
     * Get a single course.
     * 
     * @param int $id The ID of the course to retrieve.
     * @return \App\Http\Resources\CourseResource
     */
    public function show(int $id) {
        return new CourseResource($this->getCourseAction->handle($id));
    }

    public function getStudentCourses() {

    }
    

    
}
