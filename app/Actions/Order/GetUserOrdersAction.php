<?php

namespace App\Actions\Order;

use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetUserOrdersAction
{
    public function __construct(
        public OrderRepositoryInterface $orderRepository
    ){}


    public function handle(int $user_id) : Collection|null {
        return $this->orderRepository->findAll(['student_id' => $user_id]);
    }
}