<?php

namespace App\Actions\CourseReview;

use App\Repositories\Contracts\CourseReviewRepositoryInterface;

class AddCourseReviewAction
{

    public function __construct(
        public CourseReviewRepositoryInterface $courseReviewRepository
    ) {}

    

    /**
     * Creates a new course review.
     *
     * @param array $data The validated request data containing course review attributes.
     * @return void
     */
    public function handle(array $data) : void {
        $this->courseReviewRepository->create($data);
    }
}