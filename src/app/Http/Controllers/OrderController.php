<?php

namespace App\Http\Controllers;

use App\Services\OrderCounter;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder()
    {
//        $counter = OrderCounter::getInstance();
//        $count = $counter->increment();
//
//        return "✅ Order #{$count} placed successfully!";

        $orderCounter = app('orderCounter');
        $num = $orderCounter->increment();

        return "✅ Order #{$num} placed successfully !";
    }
}
