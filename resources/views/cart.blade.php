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

        <form action="cart/checkout" method="post"></form>
    @else
        <span>Your cart is empty</span>
    @endif
</div>
@endsection
