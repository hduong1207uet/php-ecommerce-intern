<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin_OrderFormRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::select('id', 'name', 'phone_number')->get();        

        return view('admin.orders.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Admin_OrderFormRequest $request)
    {
        try {
            Order::create($request->all());

            return redirect(route('orders.index'))->with('success', __('order_created'));
        } catch (Exception $e) {
            return redirect(route('orders.index'))->with('error', __('failed_to_create_order'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Admin_OrderFormRequest $request, $id)
    {
        $order = Order::findOrFail($id);
        try {
            $order->update([
                'user_id' => $request->user_id,
                'status' => $request->status,
                'ordered_date' => $request->ordered_date,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'description' => $request->description,
            ]);

            return redirect(route('orders.index'))->with('success', __('order_updated'));
        } catch (Exception $e) {
            return redirect(route('orders.index'))->with('error', __('failed_to_update_order'));
        }

        
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
        $order_details = $order->orderDetails()->with('product')->paginate(config('app.records_per_page'));        

        return view('admin.order-details.index', compact('order', 'order_details'));
    }

    public function loadOrders(Request $request) {
        $orders = Order::all()->load('user');
        $orders = $orders->toArray();
        
        return $orders;
    }

    public function approve(Request $request) {
        Order::findOrFail($request->orderId)->update([
            'status' => config('app.approved_order_id'),
        ]);
        
        $order = Order::findOrFail($request->orderId)->load('user')->toArray();
        
        return $order;
    }

    public function deny(Request $request) {
        Order::findOrFail($request->orderId)->update([
            'status' => config('app.denied_order_id'),
        ]);
        
        $order = Order::findOrFail($request->orderId)->load('user')->toArray();
        
        return $order;
    }

    public function testModel(){
        Order::findOrFail(6)
            ->update(['status' => config('app.approved_order_id')]);
        
        $order = Order::findOrFail(6)->load('user')->toArray();
        
        dd($order);
    }
}
