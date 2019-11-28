@extends('template')

@section('content')
    @if (!is_null($orders))
        @foreach ($orders as $order)
            <div class="box">
                Order #{{$order->order_id}}
                Total price : {{$order->total_price}}
            </div>
        @endforeach
    @else
        You don't have any orders
    @endif
@endsection
