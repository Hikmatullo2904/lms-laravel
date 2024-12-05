<?php 

namespace App\Actions\Course;

use App\Repositories\CourseRepositoryInterface;

class GetMentorCoursesAction {

    public function __construct(
        public CourseRepositoryInterface $courseRepository
    ) {}

    /**
     * Get all courses for the given mentor.
     *
     * @param int $mentor_id
     * @return \Illuminate\Database\Eloquent\Collection|\App\Models\Course[]
     */
    public function handle($mentor_id) {
        return $this->courseRepository->findAll(['user_id' => $mentor_id]);
    }
}