<?php

namespace App\Http\Resources;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
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
            'message' => 'role details',
            'data' => [
                'id'=> $this->id,
                'name'=> $this->name,
                'permissions' => new PermissionCollection($this->permissions)
            ]
        ];
    }
}
