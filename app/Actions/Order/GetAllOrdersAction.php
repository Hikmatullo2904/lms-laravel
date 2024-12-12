<?php

namespace App\Actions\Order;

use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GetAllOrdersAction
{

    public function __construct(
        public OrderRepositoryInterface $orderRepository  
    ){}

    /**
     * Retrieves a paginated list of all orders.
     *
     * @param int $page The page number to retrieve.
     * @param int $size The number of items per page.
     *
     * @return LengthAwarePaginator The paginated list of orders.
     */
        public function handle(int $page, int $size) : LengthAwarePaginator {
        return $this->orderRepository->getAll($page, $size);
    }
}