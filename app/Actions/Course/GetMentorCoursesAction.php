<?php 

namespace App\Actions\Course;

use App\Repositories\Contracts\CourseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

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
    public function handle($mentor_id, array $data) : Collection {
        $data['user_id'] = $mentor_id;
        return $this->courseRepository->getCourses($data);
    }
}