<?php

namespace App\Actions\Lesson;

use App\Repositories\Contracts\LessonRepositoryInterface;

class UpdateLessonAction
{
    public function __construct(
        public LessonRepositoryInterface $lessonRepository
    ) {}

    
    /**
     * Updates the specified lesson in the repository.
     *
     * @param int $id The ID of the lesson to update.
     * @param array $data The data to update the lesson with.
     * @return void
     */
    public function handle(int $id, array $data) : void {
        $this->lessonRepository->update($id, $data);
    }
}