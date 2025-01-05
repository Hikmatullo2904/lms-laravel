<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'video' => new VideoResource($this->video),
            'priority' => $this->priority,
            'duration' => $this->duration,
            "image" => $this->image ? asset('storage/' . $this->image) : null
        ];
    }
}
