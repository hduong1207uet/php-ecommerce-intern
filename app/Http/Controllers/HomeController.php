<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
        return view('admin.home');
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
            
            session()->flash('success', __('cart_updated_successfully'));    
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
}
