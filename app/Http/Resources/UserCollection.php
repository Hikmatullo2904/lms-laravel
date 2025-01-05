<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
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
            'message' => 'users list',
            'data' => $this->collection->transform(function ($user) {
                return [
                  'id' => $user->id,
                  'first_name' => $user->first_name,
                  'last_name' => $user->last_name,
                  'username' => $user->username,
                  'email' => $user->email,
                  'image' => $user->image,
                  'role_name' => $user->role_name
                ];
            }),
            'pagination' => [
                'current_page' => $this->currentPage(),
                'per_page' => $this->perPage(),
                'total_pages' => $this->lastPage(),
                'total_items' => $this->total(),
            ],
        ];
    }
}
