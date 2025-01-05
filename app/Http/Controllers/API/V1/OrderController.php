<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\Order\CreateOrderAction;
use App\Actions\Order\GetAllOrdersAction;
use App\Actions\Order\GetOrderAction;
use App\Actions\Order\GetUserOrdersAction;
use App\Actions\Order\PayOrderAction;
use App\Exceptions\CustomBadRequestException;
use App\Http\Requests\OrderPaymentRequest;
use App\Http\Resources\ApiResponse;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct(
        public CreateOrderAction $createOrderAction,
        public PayOrderAction $payOrderAction,
        public GetUserOrdersAction $getUserOrdersAction,
        public GetAllOrdersAction $getAllOrdersAction,
        public GetOrderAction $getOrderAction
    ) {
    }

    /**
     * Creates a new order for the given course.
     *
     * @param int $course_id The ID of the course to create the order for.
     * @return ApiResponse The response containing the ID of the created order.
     */
    public function create(Request $request): ApiResponse
    {
        $course_id = $request->get("course_id");
        if ($course_id === null) {
            throw new CustomBadRequestException();
        }
        $order_id = $this->createOrderAction->handle($course_id);
        return new ApiResponse($order_id);
    }

    /**
     * Process the payment for an order.
     *
     * @param OrderPaymentRequest $orderPaymentRequest The request containing validated order payment data.
     * @return ApiResponse The response indicating the success or failure of the payment process.
     */
    public function pay(OrderPaymentRequest $orderPaymentRequest): ApiResponse
    {
        $this->payOrderAction->handle($orderPaymentRequest->validated());
        return new ApiResponse(null);
    }

    /**
     * Retrieve a list of all orders made by the current user.
     *
     * @return OrderCollection The list of orders.
     */
    public function userOrders(): OrderCollection
    {
        $orders = $this->getUserOrdersAction->handle(auth()->user()->id);
        return new OrderCollection($orders);
    }

    /**
     * Retrieves a paginated list of all orders.
     *
     * @param int $page The page number to retrieve.
     * @param int $size The number of items per page.
     *
     * @return OrderCollection The paginated list of orders.
     */
    public function getOrders(int $page = 1, int $size = 10): OrderCollection
    {
        $orders = $this->getAllOrdersAction->handle($page, $size);
        return new OrderCollection($orders);
    }

    /**
     * Retrieve an order by its ID.
     *
     * @param int $id The ID of the order to retrieve.
     *
     * @return OrderResource The order with the given ID.
     */
    public function getOrder(int $id): OrderResource
    {
        $order = $this->getOrderAction->handle($id);
        return new OrderResource($order);
    }


}