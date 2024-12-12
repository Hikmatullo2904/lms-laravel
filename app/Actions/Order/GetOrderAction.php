<?php

namespace App\Actions\Order;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;

class GetOrderAction
{
    public function __construct(
        public OrderRepositoryInterface $orderRepository
    ){}

    /**
     * Retrieve an order by ID.
     *
     * @param int $order_id The ID of the order to retrieve.
     * @return \App\Models\Order|null The order with the given ID.
     */
    public function handle(int $order_id) : Order 
    {
        return $this->orderRepository->findById($order_id);
    }
}