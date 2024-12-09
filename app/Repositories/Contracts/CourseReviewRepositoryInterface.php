<?php

namespace App\Repositories\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CourseReviewRepositoryInterface extends BaseRepositoryInterface
{

    /**
     * Retrieve a list of course reviews for the given course.
     *
     * @param int $course_id The ID of the course to retrieve reviews for.
     * @param int $page The page number to retrieve.
     * @param int $size The page size.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getCourseReviews(int $course_id, int $page, int $size ) : LengthAwarePaginator;
}