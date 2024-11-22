<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiResponse extends JsonResource {
    public function toArray($request){
        return [
            'success' => true,
            'message' => 'Success',
            'data' => $this->resource
        ];
    }
}