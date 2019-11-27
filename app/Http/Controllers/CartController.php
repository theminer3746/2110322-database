<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function showCart(Request $request)
    {
        $addresses = DB::table('customer_addresses')
            ->where('customer_id', $request->session()->get('customer_id'))
            ->get();

        return view('cart')
            ->with('addresses', $addresses);
    }
    
    public function addItem(Request $request)
    {
        $request->validate([
            'id' => 'required|alpha_dash',
            'amount' => 'required|integer',
        ]);
        
        $item = (string) $request->input('id');
        $amount = (int) $request->input('amount');

        $request->session()->put('cart.' . $item, $amount);
        //$request->session()->put('cart.' + (string) $request->id, $request->amount);
        // dd($request->session()->all());
        //dd($request->session()->get());
        return redirect('carts');
    }

    public function updateItems(Request $request)
    {
        $request->validate([
            'id' => 'required|alpha_dash',
            'amount' => 'required|integer',
        ]);

        $item = (string) $request->input('id');
        $amount = (int) $request->input('amount');

        if($amount == 0){
            $request->session()->forget('cart.' . $item);
        }else{
            $request->session()->put('cart.' . $item, $amount);
        }

        return redirect('carts');
    }

    public function checkout(Request $request)
    {
        $cart = $request->session()->pull('cart');
        $saleStaffSsn = DB::table('sale_staffs')->inRandomOrder()->value('sale_staff_ssn');

        $orderId = DB::table('customer_orders')->insertGetId([
            'order_date' => date('Y-m-d H:i:s'),
            'total_price' => null,
            'customer_id' => $request->session()->get('customer_id'),
            'address_id' => $request->order_address_id,
            'sale_staff_ssn' => $saleStaffSsn,
        ]);

        $invoiceId = DB::table('invoices')->insertGetId([
            'paid_at' => null,
            'additional_information' => null,
            'payment_method' => null,
            'customer_id' => $request->session()->get('customer_id'),
            'address_id' => $request->invoice_address_id,
            'order_id' => $orderId,
        ]);

        $totalPrice = 0;
        foreach($cart as $productId => $amount){
            $totalPrice += $amount * (int) DB::table('products')
                ->where('product_id', $productId)
                ->value('price');
        }

        DB::table('customer_orders')->where('order_id', $orderId)->update([
            'total_price' => $totalPrice,
            'invoice_id' => $invoiceId,
        ]);

        return redirect('/orders');
    }
}
