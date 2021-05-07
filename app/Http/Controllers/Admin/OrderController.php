<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin_OrderFormRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('user:id,name')->paginate(config('app.records_per_page'));

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $users = User::select('id', 'name', 'phone_number')->get();

        return view('admin.orders.edit', compact('order', 'users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect(route('orders.index'))->with('success', __('order_deleted'));
    }

    /**
     * View order details.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewDetails($id)
    {
        $order = Order::findOrFail($id);
        $orderDetails = $order->orderDetails()->with('product')->paginate(config('app.records_per_page'));

        return view('admin.order-details.index', compact('order', 'orderDetails'));
    }

    public function loadOrders(Request $request) {
        $orders = Order::all()->load('user');
        $orders = $orders->toArray();

        return $orders;
    }

    public function approve(Request $request) {
        $order = Order::findOrFail($request->orderId)->load('orderDetails.product');
        foreach ($order->orderDetails as $orderDetail) {
            $quantityLeft = $orderDetail->product->quantity_in_stock - $orderDetail->quantities;
            if ($quantityLeft >= 0) {
                $orderDetail->product->quantity_in_stock = $quantityLeft;
            } else {
                return abort(Response::HTTP_NOT_FOUND);
            }
        }
        $order->status = config('app.approved_order_status');
        $order->push();
        $order->load('user')->toArray();

        return $order;
    }

    public function deny(Request $request) {
        $order = Order::findOrFail($request->orderId);
        $order->update([
            'status' => config('app.denied_order_status'),
        ]);
        $order->load('user')->toArray();

        return $order;
    }
}
