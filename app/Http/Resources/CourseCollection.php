<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CourseCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'success' => true,
            'message' => 'courses list',
            'data' => $this->collection->transform(function ($course) {
                return [
                    'id' => $course->id,
                    'title' => $course->title,
                    'description' => $course->description,
                    'languages' => $course->languages,
                    'price' => $course->price,
                    'category' => [
                        'id' => $course->category->id,
                        'name' => $course->category->name,
                        'image' => $course->category ? asset('storage/' . $course->category->image) : null
                    ],
                    'image' => $course->image ? asset('storage/' . $course->image) : null,
                    'review_count' => $course->comments_count,
                    'rating' => $course->average_rating
                ];
            })
        ];
    }
}
