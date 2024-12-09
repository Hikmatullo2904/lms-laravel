<?php

namespace App\Actions\CourseSection;

use App\Repositories\Contracts\CourseSectionRepositoryInterface;

class AddCourseSectionAction
{

    public function __construct(
        public CourseSectionRepositoryInterface $courseSectionRepository
    ) {}

    /**
     * Adds a new course section to the database.
     * 
     * @param array $data The validated request data containing course section attributes.
     * @return void
     */
    public function handle(array $data) : void {
        $this->courseSectionRepository->create($data);
    }
}