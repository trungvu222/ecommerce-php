<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('index');

Route::get('/shop', function () {
    return view('front.shop');
});

Route::get('/cart', function () {
    return view('front.cart');
});

Route::get('/product/{product}', function () {
    return view('front.shop-details');
});

Route::get('/contact', function () {
    return view('front.contact');
});

Route::get('/checkout', function () {
    return view('front.checkout');
});

Route::get('/blog', function () {
    return view('front.blog');
});

Route::get('/blog/{post}', function () {
    return view('front.blog-details');
});