<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'success' => true,
            'message' => 'Success',
            'data' => [
                'id' => $this->id,
                'title' => $this->title,
                'description' => $this->description,
                'languages' => $this->languages,
                'price' => $this->price,
                'image' => $this->image ? asset('storage/' . $this->image) : null,
                'category' => [
                    'id' => $this->category->id,
                    'name' => $this->category->name,
                    'image' => new ImageResource($this->category->image)
                ],
                'sections' => CourseSectionResource::collection($this->sections),
            ]
        ];
    }
}