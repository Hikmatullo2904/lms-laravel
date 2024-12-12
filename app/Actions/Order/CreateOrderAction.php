<?php

namespace App\Actions\Order;

use App\Repositories\Contracts\CourseRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;

class CreateOrderAction
{

    public function __construct(
        public OrderRepositoryInterface $orderRepository,
        public CourseRepositoryInterface $courseRepositoryInterface
    ){}

    /**
     * Create a new order.
     *
     * @param int $course_id The course to enroll in.
     * @return int The ID of the created order.
     */
    public function handle(int $course_id) : int 
    {
        $course = $this->courseRepositoryInterface->findById($course_id);
        $data = [];
        $data['student_id'] = auth()->user()->id;
        $data['course_id'] = $course_id;
        $data['status'] = 'pending';
        $data['price'] = $course->price;
        $order = $this->orderRepository->create($data);
        return $order->id;
    }
}