<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface CourseRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Retrieve a list of courses. If given, the list will be filtered by the
     * provided parameters.
     *
     * @param array $params The parameters to filter by. Valid keys are:
     *     - user_id: The ID of the user who created the course.
     *     - category_id: The ID of the category.
     *     - size: The page size.
     *     - page: The page number to retrieve.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    function getCourses(array $params = []) : Collection;

    /**
     * Retrieve a list of courses belonging to the given student.
     *
     * @param int $student_id The ID of the student whose courses are to be retrieved.
     *
     * @return \Illuminate\Database\Eloquent\Collection A collection of the student's courses.
     */
    function getStudentCourses(int $student_id) : Collection;
}