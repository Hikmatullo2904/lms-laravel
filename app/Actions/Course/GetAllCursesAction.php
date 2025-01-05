<?php

namespace App\Actions\Course;

use App\Repositories\Contracts\CourseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetAllCursesAction
{

    public function __construct(
        public CourseRepositoryInterface $courseRepository
    ) {
    }

    /**
     * Retrieves all courses from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\App\Models\Course[]
     */
    public function handle(array $data): Collection
    {
        return $this->courseRepository->getCourses($data);
    }
}