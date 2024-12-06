<?php

namespace App\Actions\Course;

use App\Repositories\Contracts\CourseRepositoryInterface;

class GetCourseAction {
    public function __construct(
        public CourseRepositoryInterface $courseRepository
    ) {}


    /**
     * Get a single course.
     *
     * @param int $id The ID of the course to retrieve.
     * @return \App\Models\Course|null
     */
    public function handle(int $id) {
        return $this->courseRepository->findById($id);
    }
}