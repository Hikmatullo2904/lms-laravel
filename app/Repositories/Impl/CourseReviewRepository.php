<?php

namespace App\Repositories\Impl;

use App\Models\CourseReview;
use App\Repositories\Contracts\CourseReviewRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CourseReviewRepository extends BaseRepository implements CourseReviewRepositoryInterface
{
    public function __construct(CourseReview $model)
    {
        parent::__construct($model);
    }

    /**
     * Retrieve a list of course reviews for the given course.
     *
     * @param int $course_id The ID of the course to retrieve reviews for.
     * @param int $page The page number to retrieve.
     * @param int $size The page size.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getCourseReviews(int $course_id, int $page, int $size) : LengthAwarePaginator
    {
        return $this->model->where('course_id', $course_id)->paginate($size, ['*'], 'page', $page);
    }

}