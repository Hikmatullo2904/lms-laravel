<?php
namespace App\Actions\Course;

use App\Repositories\Contracts\CourseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetStudentCourseAction
{
    public function __construct(
        public CourseRepositoryInterface $courseRepository
    ){}

    /**
     * Retrieves all courses for the given student.
     *
     * @param int $student_id The ID of the student whose courses are to be retrieved.
     * @return \Illuminate\Database\Eloquent\Collection|\App\Models\Course[] A collection of courses belonging to the given student.
     */
    public function handle(int $student_id) : Collection
    {
        return $this->courseRepository->getStudentCourses($student_id);
    }
}