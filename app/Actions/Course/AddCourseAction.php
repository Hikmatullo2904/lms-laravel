<?php

namespace App\Actions\Course;

use App\Repositories\Contracts\CourseRepositoryInterface;

class AddCourseAction
{


    public function __construct(
        public CourseRepositoryInterface $courseRepository
    ) {}

    /**
     * Handles the addition of a new course.
     * @return void
     */
    public function handle(array $data, int $mentorId) : void {
        $data['user_id'] = $mentorId;
        $this->courseRepository->create($data);
    }
}