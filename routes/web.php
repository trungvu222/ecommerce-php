<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
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
// cart routes
Route::post('add_to_cart', [CartController::class, 'addToCart'])->name('add_to_cart');
Route::post('remove_from_cart', [CartController::class, 'removeFromCart'])->name('remove_from_cart');
Route::post('update_cart', [CartController::class, 'updateCart'])->name('update_cart');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
// checkout routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
// order routes
Route::get('/success_payment', [OrderController::class, 'successPayment'])->name('success_payment');
Route::get('/cancelled_payment', [OrderController::class, 'cancelledPayment'])->name('cancelled_payment');


Route::get('/shop', function () {
    return view('front.shop');
})->name('shop');

Route::get('/category/{category:slug}', function () {
    return view('front.category');
})->name('category');

Route::get('/wishlist', function () {
    dd( \Cart::instance('wishlist')->content() );
    // return view('front.cart');
});

Route::get('/product/{product}', function () {
    return view('front.shop-details');
})->name('product');

Route::get('/contact', function () {
    return view('front.contact');
})->name('contact');

Route::get('/blog', function () {
    return view('front.blog');
})->name('blog');

Route::get('/blog/{post:slug}', function () {
    return view('front.blog-details');
})->name('post');