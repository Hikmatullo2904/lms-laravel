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

}