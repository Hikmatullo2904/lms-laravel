<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            $this->collection->transform(function ($order) {
                return [
                    'id' => $order->id,
                    'price' => $order->price,
                    'status' => $order->status,
                    'created_at' => $order->created_at
                ];
            })
        ];
    }
}
