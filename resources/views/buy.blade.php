@extends('template')

@section('content')
    {{ $product->product_id }} <br>
    {{ $product->product_name }} <br>
    <form action="/carts" method="post">
        <div class="field">
            <label class="label">Amount</label>
            <div class="control">
                <input type="text" class="input" value="1" name="amount">
            </div>
        </div>

        <input type="hidden" name="id" value="{{$product->product_id}}">
        {{ csrf_field() }}

        <div class="field">
            <div class="control">
                <button class="button is-link">
                    Add to cart &nbsp;<i class="fas fa-shopping-cart"></i>
                </button>
            </div>
        </div>
    </form>
    
@endsection
