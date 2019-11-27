@extends('template')

@section('content')
<div class="columns is-centered">
    @if (session()->get('cart') !== null)
        <table class="table">
            <thead>
                <tr>
                    <th>Product name</th>
                    <th>Product ID</th>
                    <th>Amount</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach (session()->get('cart') as $product_id => $amount)
                    <form action="/carts" method="post">
                        {{ method_field('patch') }}
                        <tr>
                            <td>{{DB::table('products')->where('product_id', $product_id)->value('product_name')}}</td>
                            <td>{{$product_id}}</td>
                            <td><input class="input" type="text" name="amount" value="{{$amount}}"></td>
                            <input type="hidden" name="id" value="{{$product_id}}">
                            @csrf
                            <td><button class="button is-link">Submit</button></td>
                        </tr>
                    </form>
                @endforeach
            </tbody>
        </table>
    @else
        <span>Your cart is empty</span>
    @endif
</div>
<hr style="margin: 3 0 3rem;"> 
<div class="columns is-centered">
    <form action="carts/checkout" method="post">
        <div class="field">
            <label class="label">Shipping address</label>
            <div class="control">
                <div class="select">
                    <select name="order_address_id">
                        @foreach ($addresses as $address)
                            <option value="{{$address->address_id}}">{{$address->line_1}}, {{$address->line_2}}, {{$address->city}}, {{$address->country}}, {{$address->postal_code}}</option>>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="field">
            <label class="label">Billing address</label>
            <div class="control">
                <div class="select">
                    <select name="invoice_address_id">
                        @foreach ($addresses as $address)
                            <option value="{{$address->address_id}}">{{$address->line_1}}, {{$address->line_2}}, {{$address->city}}, {{$address->country}}, {{$address->postal_code}}</option>>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        @csrf
        <div class="field">
            <div class="control">
                <button class="button is-link">Checkout</button>
            </div>
        </div>
    </form>
</div>
@endsection
