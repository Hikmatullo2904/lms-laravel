<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LessonCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            $this->collection->transform(function ($item) {
                return [
                    "id"=> $item->id,
                    "title" => $item->title,
                    "image" => $item->image ? asset('storage/' . $item->image) : null,
                    "duration" => $item->duration,
                    'priority' => $item->priority
                ];
            })
        ];
    }
}
