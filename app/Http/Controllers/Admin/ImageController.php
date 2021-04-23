<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Product;
use App\Http\Requests\ImageFormRequest;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::with('product:id,name')->paginate(config('app.records_per_page'));        

        return view('admin.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productIds = Product::select('id', 'name')->get();

        return view('admin.images.create', compact('productIds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageFormRequest $request)
    {
        $data = [];
        foreach ($request->asset_uri_group as $asset_uri) {
            array_push($data, 
            [
                'asset_uri' => $asset_uri,
                'product_id' => $request->product_id,
                'description' => $request->description,
            ]);
        }
        Image::insert($data);

        return redirect(route('images.index'))->with('success', __('image_created'));
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
     * Display images of the specified products.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewImages($id)
    {
        $images = Product::findOrFail($id)->images()->paginate(config('app.records_per_page'));

        return view('admin.images.index', compact('images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::with('product:id')->findOrFail($id);
        $productIds = Product::select('id', 'name')->get();

        return view('admin.images.edit', compact('image', 'productIds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImageFormRequest $request, $id)
    {
        $image = Image::findOrFail($id);

        $image->update([
            'asset_uri' => $request->asset_uri_group,
            'product_id' => $request->product_id,
            'description' => $request->description,       
        ]);

        return redirect(route('products.view_images', $id))->with('success', __('image_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $image->delete();

        return redirect(route('products.view_images', $id))->with('success', __('image_deleted'));  
    }
}
