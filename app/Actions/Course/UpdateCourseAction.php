<?php

namespace App\Actions\Course;

use App\Repositories\CourseRepositoryInterface;

class UpdateCourseAction
{

    public function __construct(
        public CourseRepositoryInterface $courseRepository
    ) {}

    /**
     * Handle the update of a course.
     *
     * @return void
     */
    public function handle($id, array $data) : void {
        $this->courseRepository->update($id, $data);
    }
}