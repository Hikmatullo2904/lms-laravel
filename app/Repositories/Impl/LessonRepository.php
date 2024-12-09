<?php

namespace App\Repositories\Impl;

use App\Models\Lesson;
use App\Repositories\Contracts\LessonRepositoryInterface;

class LessonRepository extends BaseRepository implements LessonRepositoryInterface
{
    public function __construct(Lesson $model)
    {
        parent::__construct($model);
    }
}