<?php

namespace App\Repositories\Order;

use App\Repositories\BaseRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Order::class;
    }

    public function getDetails($id)
    {
        return Order::findOrFail($id)->orderDetails()->with('product')->paginate(config('app.records_per_page'));
    }

    public function loadOrders()
    {
        return Order::with('user')->get()->toArray();
    }
}
