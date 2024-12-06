<?php

namespace App\Repositories\Impl;

use App\Models\CourseSection;
use App\Repositories\Contracts\CourseSectionRepositoryInterface;

class CourseSectionRepository extends BaseRepository implements CourseSectionRepositoryInterface
{
    
    public function __construct(CourseSection $model)
    {
        parent::__construct($model);    
    }
}