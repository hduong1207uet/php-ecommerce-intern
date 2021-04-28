<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Http\Requests\Admin_OrderDetailFormRequest;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDetail($orderId)
    {
        $products = Product::select('id', 'name')->get();

        return view('admin.order-details.create', compact('orderId', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Admin_OrderDetailFormRequest $request)
    {        
        try {
            OrderDetail::create($request->all());

            return redirect(route('orders.view_details', $request->order_id))->with('success', __('order_detail_created'));
        } catch (Exception $e) {
            return redirect(route('orders.view_details'))->with('error', __('failed_to_create_order_detail'));
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
        $products = Product::select('id', 'name')->get();
        $order_detail = OrderDetail::findOrFail($id);

        return view('admin.order-details.edit', compact('products', 'order_detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Admin_OrderDetailFormRequest $request, $id)
    {        
        $order_detail = OrderDetail::findOrFail($id);
        try {
            $order_detail->update([
                'product_id' => $request->product_id,
                'quantities' => $request->quantities,
                'required_date' => $request->required_date,
                'shipped_date' => $request->shipped_date,
                'status' => $request->status,
            ]);

            return redirect(route('orders.view_details', $request->order_id))->with('success', __('order_detail_updated'));
        } catch (Exception $e) {
            return redirect(route('orders.view_details', $request->order_id))->with('error', __('failed_to_update_order_detail'));
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
        $order_detail = OrderDetail::findOrFail($id);
        $order_detail->delete();

        return redirect(route('orders.view_details', $order_detail->order_id))->with('success', __('order_detail_deleted'));
    }
}
