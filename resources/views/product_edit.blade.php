@extends('template')

@section('content')
    <div class="columns">
        Product name : {{$product->product_name}} <br>
        Product Id : {{$product->product_id}}
    </div>
    <div class="columns is-centered">
        <form action="/products/{{$product->product_id}}/edit" method="post">
            {{-- <div class="field">
                <label class="label">{{$material->name}}</label>
                <div class="control">
                    <input type="text" class="input" value="{{$material->amount}}">
                </div>
            </div> --}}
            <table class="table">
                <thead>
                    <tr>
                        <th>Material Name</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php //dd($materials); ?>
                    @foreach ($materials as $key => $material)
                        <tr>
                            <td>{{$material->name}}</td>
                            <td><input type="text" class="input" name="material_{{$material->material_id}}" value="{{$material->amount}}"></td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>
                            <div class="select">
                                <select name="new_material_id">
                                    @foreach ($allMaterials as $key => $material)
                                        <option value="{{$material->material_id}}">{{$material->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="control">
                                <input type="text" class="input" name="new_material_amount">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="field">
                <div class="control">
                    <button class="button is-link">Edit</button>
                </div>
            </div>
            @csrf
        </form>
    </div>
@endsection
