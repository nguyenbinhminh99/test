<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGateway;
use App\Orders\OrderDetails;
use Illuminate\Http\Request;

class PayOrderController extends Controller
{
    public function store(OrderDetails $orderDetails, PaymentGateway $paymentGateway){
//        $paymentGateway = new PaymentGateway('usd');
        $order = $orderDetails->all();
        dump($paymentGateway->charge(amount: 2500));
        dump($order);
    }
}
