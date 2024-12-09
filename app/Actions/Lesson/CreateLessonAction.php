<?php

namespace App\Actions\Lesson;

use App\Repositories\Contracts\LessonRepositoryInterface;

class CreateLessonAction
{
    
    public function __construct(
        public LessonRepositoryInterface $lessonRepository
    ) {}

    
    /**
     * Creates a new lesson.
     *
     * @param array $data The validated data to create the lesson with.
     * @return void
     */
    public function handle(array $data) : void {
        $this->lessonRepository->create($data);
    }
}