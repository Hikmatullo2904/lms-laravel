<?php

namespace App\Repositories\Contracts;

interface CourseRepositoryInterface extends BaseRepositoryInterface
{
    function getCourses(array $params = []);
}