<?php

namespace App\Actions\CourseReview;

use App\Repositories\Contracts\CourseReviewRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GetCourseReviewsAction
{

    public function __construct(
        public CourseReviewRepositoryInterface $courseReviewRepository
    ) {}

    /**
     * Retrieve a list of course reviews for the given course.
     *
     * @param int $course_id The ID of the course to retrieve reviews for.
     * @param int $page The page number to retrieve.
     * @param int $size The page size.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function handle(int $course_id, int $page, int $size) : LengthAwarePaginator {
        return $this->courseReviewRepository->getCourseReviews($course_id, $page, $size);
    }
}