<?php

namespace App\Actions\CourseReview;

use App\Models\CourseReview;
use App\Repositories\Impl\CourseReviewRepository;

class UpdateCourseReviewAction
{
    public function __construct(
        public CourseReviewRepository $courseReviewRepository
    ){}


    public function handle(CourseReview $courseReview, array $data) : void 
    {
        $courseReview->update($data);
    }

}