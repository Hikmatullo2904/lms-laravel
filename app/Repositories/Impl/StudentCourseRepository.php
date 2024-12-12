<?php

namespace App\Repositories\Impl;

use App\Models\StudentCourse;
use App\Repositories\Contracts\StudentCourseRepositoryInterface;
use App\Repositories\Impl\BaseRepository;

class StudentCourseRepository extends BaseRepository implements StudentCourseRepositoryInterface
{
    public function __construct(StudentCourse $model){
        parent::__construct($model);
    }
}