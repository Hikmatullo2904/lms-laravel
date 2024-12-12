<?php

namespace App\Repositories\Impl;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{

    public function __construct(Order $model) {
        parent::__construct($model);
    }
 
    /**
     * Save the order.
     *
     * @param Order $order The order to save.
     *
     * @return void
     */
    public function save(Order $order): void 
    {
        $order->save();
    }

    /**
     * Retrieve a paginated list of orders.
     *
     * @param int $page The page number to retrieve.
     * @param int $size The number of items per page.
     * @return LengthAwarePaginator The paginated list of orders.
     */
    public function getAll(int $page, int $size) : LengthAwarePaginator {
        return $this->model->paginate($size, ['*'], 'page', $page);
    }
}