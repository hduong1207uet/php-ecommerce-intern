<?php

namespace App\Repositories\Order;

use Illuminate\Http\Request;
use App\Repositories\RepositoryInterface;

interface OrderRepositoryInterface extends RepositoryInterface
{
    /**
    * Get detail of Order
    * @param  int $id
    * @return array $orderDetails
    */
    public function getDetails($id);

    /**
    * Get all Orders
    * @param
    * @return array $orders
    */
    public function loadOrders();
}
