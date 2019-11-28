@extends('template')

@section('content')
    <?php dd($invoices);?>
    @if (!is_null($invoices))
        @foreach ($invoices as $invoice)
            <div class="box">
                {{$invoice->paid_at}}
            </div>
        @endforeach
    @else
        You don't have any invoices
    @endif
@endsection
