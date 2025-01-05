<?php

namespace App\Actions\Lesson;

use App\Exceptions\CustomAccessDeniedException;
use App\Models\Lesson;
use App\Repositories\Contracts\CourseRepositoryInterface;
use App\Repositories\Contracts\LessonRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;

class GetLessonByIdAction
{

    public function __construct(
        public LessonRepositoryInterface $lessonRepository,
        public CourseRepositoryInterface $courseRepository
    ){}

    public function handle(int $id) : Lesson 
    {

        $user = auth()->user();
        $hasAccess = false;
        $lesson = $this->lessonRepository->findById($id);
        if($user->role_name == 'ADMIN') {
            $hasAccess = true;
        }elseif($lesson->courseSection->course->user_id == $user->id) {
            $hasAccess = true;
        }elseif($this->courseRepository->getStudentCourses($user->id)->contains('id', $lesson->courseSection->course->id)) {
            $hasAccess = true;
        }

        if(!$hasAccess) {
            throw new CustomAccessDeniedException('You do not have access to this lesson');
        }

        return $lesson;
    }

}