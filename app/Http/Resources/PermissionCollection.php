<?php

namespace App\Http\Resources;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PermissionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            $this->collection->transform(function (Permission $permission) {
                return [
                    'id' => $permission->id,
                    'name' => $permission->name
                ];
            })
        ];
    }
}
