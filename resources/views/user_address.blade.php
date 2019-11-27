@extends('template')

@section('content')
    {{-- @if ($errors->any())
        <div class="has-text-danger box">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    @foreach ($addresses as $address)
       <form action="/users/addresses" method="post">
            <div class="field">
                <label class="label">
                    Line 1
                </label>
                <div class="control">
                    <input type="text" class="input" placeholder="Line 1" name="line_1" value="{{$address->line_1}}">
                </div>
            </div>
            <div class="field">
                <label class="label">
                    Line 2
                </label>
                <div class="control">
                    <input type="text" class="input" placeholder="Line 2" name="line_2" value="{{$address->line_2}}">
                </div>
            </div>
            <div class="field">
                <label class="label">
                    City
                </label>
                <div class="control">
                    <input type="text" class="input" placeholder="City" name="city" value="{{$address->city}}">
                </div>
            </div>
            <div class="field">
                <label class="label">
                    Country
                </label>
                <div class="control">
                    <div class="select">
                        <select name="country">
                            {{-- @foreach ($countryList as $countryCode => $countryName)
                                @if ($countryCode === $address->country)
                                    <option value="{{$countryCode}}" selected>{{$countryName}}</option>    
                                @else
                                    <option value="{{$countryCode}}">{{$countryName}}</option>  
                                @endif
                            @endforeach --}}
                            @foreach ($countryList as $countryCode => $countryName)
                                <option value="{{$countryCode}}" @if ($countryCode === $address->country) selected @endif>{{$countryName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label">
                    Postal Code
                </label>
                <div class="control">
                    <input type="text" class="input" placeholder="Postal" name="postal_code" value="{{$address->postal_code}}">
                </div>
            </div>
            <input type="hidden" name="address_id" value="{{$address->address_id}}">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="field">
                <div class="control">
                    <button class="button is-link">Change</button>
                </div>
            </div>
        </form>
        <hr style="margin: 3 0 3rem;"> 
    @endforeach
    {{-- <form action="/users/addresses" method="post">
        <div class="field">
            <label class="label">
                Line 1
            </label>
            <div class="control">
                <input type="text" class="input" placeholder="Line 1" name="line_1" value="">
            </div>
        </div>
        <div class="field">
            <label class="label">
                Line 2
            </label>
            <div class="control">
                <input type="text" class="input" placeholder="Line 2" name="line_2" value="">
            </div>
        </div>
        <div class="field">
            <label class="label">
                City
            </label>
            <div class="control">
                <input type="text" class="input" placeholder="City" name="city" value="">
            </div>
        </div>
        <div class="field">
            <label class="label">
                Country
            </label>
            <div class="control">
                <div class="select">
                    <select name="country">
                        @foreach ($countryList as $countryCode => $countryName)
                            <option value="{{$countryCode}}">{{$countryName}}</option>  
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="field">
            <label class="label">
                Postal Code
            </label>
            <div class="control">
                <input type="text" class="input" placeholder="Postal" name="postal_code" value="">
            </div>
        </div>
        @csrf
        <div class="field">
            <div class="control">
                <button class="button is-link">Add</button>
            </div>
        </div>
    </form> --}}
@endsection
