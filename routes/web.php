<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', ClientController::class)->name('home');

Route::namespace('Auth')->group(function () {
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register');
});    

Route::prefix('cart')->group(function () {
    Route::get('/', 'HomeController@viewCart')->name('cart');
    Route::post('/add-product/{id}', 'HomeController@addProductToCart')->name('add_product_to_cart');
    Route::patch('/update-cart', 'HomeController@updateCart')->name('update_cart');
    Route::delete('/remove-from-cart/{id}/', 'HomeController@removeFromCart')->name('remove_from_cart');
});

Route::get('lang/{lang}','LangController@changeLang')->name('lang');

Route::get('/home', 'HomeController@index')->name('admin-home');

Route::namespace('Admin')->group(function () {
    Route::get('/products/view-images/{id}', 'ImageController@viewImages')->name('products.view_images');
    
    Route::resources([
        'categories' => 'CategoryController',
        'products' => 'ProductController',
        'images' => 'ImageController',
    ]);
});
