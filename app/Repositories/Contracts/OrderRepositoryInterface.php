<?php

namespace App\Repositories\Contracts;

use App\Models\Order;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


interface OrderRepositoryInterface extends BaseRepositoryInterface
{

    /**
     * Save the order to the database.
     *
     * @param Order $order The order instance to be saved.
     * @return void
     */
    public function save(Order $order): void;

    /**
     * Retrieve a paginated list of orders.
     *
     * @param int $page The page number to retrieve.
     * @param int $size The number of items per page.
     * @return LengthAwarePaginator The paginated list of orders.
     */
    public function getAll(int $page, int $size) : LengthAwarePaginator;
}