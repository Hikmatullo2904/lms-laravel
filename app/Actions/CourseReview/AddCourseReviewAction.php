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
        $course = $this->courseReviewRepository->findOne(['user_id' => $data['user_id'], 'course_id' => $data['course_id']]);
        if ($course == null) {
            $this->courseReviewRepository->create($data);
        } else {
            $this->courseReviewRepository->update($course->id, $data);
        }
    }
}