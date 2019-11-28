<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerOrderController extends Controller
{
    public function showOrderPage(Request $request)
    {   
        $orders = DB::table('customer_orders')
            ->where('customer_id', $request->session()->get('customer_id'))
            ->get();

        return view('order')->with('orders', $orders);
    }
}
