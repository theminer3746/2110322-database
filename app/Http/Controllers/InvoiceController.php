<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function showAllInvoices(Request $request)
    {
        $invoices = DB::table('invoices')
            ->where('customer_id', $request->session()->get('customer_id'))
            ->get();

        // foreach($invoices as $invoice){
        //     $element[]['invoice'] = 
        // }

        $orderIds = DB::table('invoices')
            ->where('customer_id', $request->session()->get('customer_id'))
            ->pluck('invoice_id');

        

        // $shippingAddresses = DB::table('addresses')
        //     ->whereIn('order_id', $orderIds)
        //     ->get();

        // $shippingAddresses = DB::table('customer_addresses')
        //     ->where('customer_id', $request->session()->get('customer_id'))
        //     ->where('order_id', $orderIds)
        //     ->get();

        // $billingAddresses = DB::table('customer_addresses')
        //     ->where('customer_id', $request->session()->get('customer_id'))
        //     ->where('order_id', $orderIds)
        //     ->get();        

        // dd($invoices, $orderIds, $addresses, $shippingAddresses);

        return view('invoice')->with('invoices', $invoices);
    }
}
