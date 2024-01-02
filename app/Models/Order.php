<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'country',
        'city',
        'zipcode',
        'notes',
        'price', 
        'payment_method', 
        'status'
    ];

    public const STRIPE_PAYMENT_METHOD = 'STRIPE';
    public const PAYPAL_PAYMENT_METHOD = 'PAYPAL';

    public const PENDING_ORDER_STATUS = 'pending';
    public const CANCELED_ORDER_STATUS = 'canceled';
    public const SUCCESS_ORDER_STATUS = 'success';

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }
}
