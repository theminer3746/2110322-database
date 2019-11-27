@extends('template')

@section('content')
    @for ($i = 0; $i < $products->count(); $i++)
        @if ($i % 4 == 0)
            <div class="columns">
        @endif

        <div class="column">
            <div class="box">
                <a href="/products/{{ $products[$i]->product_id }}">
                    <figure class="image is-128x128">
                        <img src="noimg.png">
                    </figure>
                    Product code : {{ $products[$i]->product_id }} <br>
                    Product name : {{ $products[$i]->product_name }} <br>
                    Price : {{ $products[$i]->price }} THB <br>
                    Stock : {{ $products[$i]->amount  }}
                </a>
            </div>
        </div>

        @if ($i % 4 == 3)
            </div>
        @endif
    @endfor
    
@endsection
