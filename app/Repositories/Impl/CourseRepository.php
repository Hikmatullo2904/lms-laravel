<?php

namespace App\Repositories\Impl;

use App\Models\Course;
use App\Repositories\Contracts\CourseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class CourseRepository extends BaseRepository implements CourseRepositoryInterface
{
    public function __construct(Course $model)
    {
        parent::__construct($model);
    }

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
    public function getCourses(array $params = []): Collection
    {
        $query = $this->model
            ->withCount([
                'course_reviews as comments_count',
                'course_reviews as average_rating' => function ($query) {
                    $query->select(DB::raw('AVG(rating)'));
                }
            ])
            ->when(isset($params['user_id']), function ($query) use ($params) {
                return $query->where('user_id', $params['user_id']);
            })
            ->when(isset($params['category_id']), function ($query) use ($params) {
                return $query->where('category_id', $params['category_id']);
            });

        return $query
            ->skip(($params['page'] - 1) * $params['size'])
            ->take($params['size'])
            ->get();
    }

    /**
     * Retrieve a list of courses belonging to the given student.
     *
     * @param int $student_id The ID of the student whose courses are to be retrieved.
     *
     * @return \Illuminate\Database\Eloquent\Collection A collection of the student's courses.
     */
    public function getStudentCourses(int $student_id) : Collection 
    {
        $boughtCourses = Course::whereHas('orders', function ($query) use ($student_id) {
            $query->where('student_id', $student_id)
                  ->where('status', 'paid');
        })->get();
    
        return $boughtCourses;
    }

}