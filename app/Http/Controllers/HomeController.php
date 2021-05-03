<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\OrderFormRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderDetail;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role->id == config('app.admin_id')) {
            return view('admin.home');
        }

        return redirect(route('home'));
    }

    /**
     * Show the user cart
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function viewCart()
    {
        return view('client.cart.index');
    }

    /**
     * Add Product to Cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addProductToCart($id)
    {    
        $product = Product::findOrFail($id);        
        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "featured_img" => $product->featured_img,                        
                ],
            ];
            session()->put('cart', $cart);

            return redirect()->back()->with('success', __('add_product_successfully'));
        }
        // if cart not empty then check if this product exist then increase quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);

            return redirect()->back()->with('success', __('add_product_successfully'));
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "featured_img" => $product->featured_img,            
        ];
        session()->put('cart', $cart);

        return redirect()->back()->with('success', __('add_product_successfully'));
    }

    /**
     * Update Cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCart(Request $request)
    {            
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        
        return abort(Response::HTTP_NOT_FOUND);
    }

    /**
     * Delete product from Cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function removeFromCart($id)
    {
        if (isset($id)) {
            $cart = session()->get('cart');
            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }

            return redirect()->route('cart')->with('success', __('product_removed_successfully'));    
        }

        return abort(Response::HTTP_NOT_FOUND);
    }

    /**
     * Client - View product detail.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewProductDetail($id)
    {
        $product = Product::findOrFail($id);        
        $related_products = Product::where('category_id', $product->category_id)->limit(config('app.related_product_records'))->get();
        
        return view('client.products.show', compact('product', 'related_products'));
    }

    /**
     * Buy product action
     */
    public function buyProducts()
    {
        if (session('cart') == NULL) {
            return redirect(route('cart'))->with('error', __('order_failed_because_your_cart_is_empty'));
        }
        
        return view('client.cart.order');
    }

    /**
     * Order product
     */
    public function order(OrderFormRequest $request)
    {                       
        //begin transaction
        DB::beginTransaction();
        try {
            $orderRecord = [
                'user_id' => Auth::user()->id,
                'status' => config('app.default_order_status'),
                'ordered_date' => now(),
                'phone_number' =>  $request->phone_number,
                'description' => $request->txt_note,
                'address' => $request->txt_address,  
            ]; 
            $order = Order::create($orderRecord);
            
            $orderDetails = [];
            foreach (session('cart') as $id => $details) {
            array_push($orderDetails, [
                'order_id' => $order->id,
                'product_id' => $id,
                'quantities' => $details['quantity'],
                'status' => config('app.default_order_status'),
                ]);
            }

            OrderDetail::insert($orderDetails);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            
            return redirect(route(cart))->with('error', __('order_failed'));
        }
        $request->session()->forget('cart');

        return redirect(route('cart'))->with('success', __('you_have_ordered_successfully'));
    }

    public function updateCartQuantity(Request $request)
    {
        $cart = session()->get('cart');
        if ($request->product_id && $request->new_quantity) {
            $cart[$request->product_id]['quantity'] = $request->new_quantity;
            session()->put('cart', $cart);
        }
        return $cart[$request->product_id];
    }
}
