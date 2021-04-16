<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __invoke()
    {        
        $recommededGuitars = Product::orderBy('avg_rate', 'desc')->limit(config('app.records_recommended_guitar'))->get(); 
        $acousticGuitars = Product::where('category_id', '=', config('app.acoustic_id'))->limit(config('app.records_acoustic_guitar'))->get();
        $classicGuitars = Product::where('category_id', '=', config('app.classic_id'))->limit(config('app.records_classic_guitar'))->get();        

        return view('client.home', compact('recommededGuitars', 'acousticGuitars', 'classicGuitars'));
    }
}
