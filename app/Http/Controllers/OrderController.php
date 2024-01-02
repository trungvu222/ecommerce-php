<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function successPayment() {
        return view('front.order.success_payment');
    }
    
    public function cancelledPayment() {
        return view('front.order.cancelled_payment');
    }
}
