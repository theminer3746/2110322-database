@extends('template')

@section('content')
<form action="login" method="post">
    <div class="field">
        <label class="lavel">Username</label>
        <div class="control">
            <input type="text" class="input" placeholder="Username" name="username">
        </div>
    </div>
    <div class="field">
        <label class="lavel">Password</label>
        <div class="control">
            <input type="password" class="input" placeholder="Password" name="password">
        </div>
    </div>
    {{ csrf_field() }}
    <div class="field">
        <div class="control">
            <button class="button is-link">Submit</button>
        </div>
    </div>
</form>
@endsection
