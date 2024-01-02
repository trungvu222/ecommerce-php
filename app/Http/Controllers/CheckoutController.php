<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

use App\Http\Requests\Checkout\CheckoutRequest;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('front.checkout', [
            'cart_products' => Cart::getAll()
        ]);
    }

    public function store(CheckoutRequest $request)
    {
        $request_attributes = $request->all();
        $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );

        $line_items = [];
        $orderPrice = 0;
        $item_ids = [];

        foreach(Cart::getAll() as $item)
        {
            $orderPrice += $item->model->price;

            $price_data = [];
            $price_data['currency'] = 'usd';
            $price_data['product_data'] = ['name' => $item->model->title];
            $price_data['unit_amount'] = $item->model->price;

            $item_data = array(
                'price_data' => $price_data,
                'quantity' => $item->qty
            );
            $line_items[] = $item_data;
            $item_ids[] = array('product_id' => $item->model->id);
        }
        $line_items[] = array(
            'price_data' => array(
                'currency' => 'usd',
                'product_data' => ['name' => 'Tax'],
                'unit_amount' => \Cart::tax(0, '', '')
            ),
            'quantity' => 1
        );

        $orderPrice += \Cart::tax(0, '', '');

        // inserting a new order for this session

        $main_order_attributes = [
            'price' => $orderPrice,
            'payment_method' => Order::STRIPE_PAYMENT_METHOD,
            'status' => Order::PENDING_ORDER_STATUS
        ];
        $all_attributes = array_merge($main_order_attributes, $request_attributes);
        
        $order = Order::create($all_attributes);

        $orderItems = $order->orderItems()->createMany($item_ids);
        
        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => route('success_payment'),
            'cancel_url' => route('cancelled_payment'),
        ]);

        return redirect($checkout_session->url);
    }
}
