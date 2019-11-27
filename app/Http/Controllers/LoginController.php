<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $request->session()->regenerate();

        if(DB::table('customers')->where('username', $request->username)->exists()){
            $user = DB::table('customers')->where('username', $request->username)->first();

            $request->session()->put('loggedIn', true);
            $request->session()->put('customer_id', $user->customer_id);
            $request->session()->put('username', $user->username);

            return redirect('/');
        }else{
            return redirect()->back()->withErrors(['msg', 'Incorrect username']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();

        return response()->json([
            'status' => 'success',
        ]);
    }
}
