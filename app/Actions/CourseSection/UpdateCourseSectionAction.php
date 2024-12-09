<?php

namespace App\Actions\CourseSection;

use App\Models\CourseSection;
use App\Repositories\Contracts\CourseSectionRepositoryInterface;

class UpdateCourseSectionAction {
    public function __construct(
        public CourseSectionRepositoryInterface $courseSectionRepository
    ) {}
    

    /**
     * Update the specified course section in storage.
     *
     * @param int $id The ID of the course section to update.
     * @param array $data The validated request data containing the attributes to update the course section with.
     * @return void
     */
    public function handle(int $id, array $data) : void {
        $this->courseSectionRepository->update($id, $data);
    }
}