<?php

namespace App\Actions\Order;

use App\Exceptions\CustomPaymentException;
use App\Repositories\Contracts\OrderRepositoryInterface;

class PayOrderAction
{
    public function __construct(
        public OrderRepositoryInterface $orderRepository
    ){}

    
    /**
     * Handles the payment of an order.
     *
     * @param array $data The data containing 'order_id' and 'amount' to be used for payment.
     *
     * @throws CustomPaymentException If the amount is invalid or the order is not pending.
     *
     * @return void
     */
    public function handle(array $data) {
        $order = $this->orderRepository->findById($data['order_id']);
        if($order->price != $data['amount']) {
            throw new CustomPaymentException('Invalid amount');
        }
        if($order->status != 'pending') {
            throw new CustomPaymentException('Order is not pending');
        }
        $order->status = 'paid';
        $this->orderRepository->save($order);
    }
}