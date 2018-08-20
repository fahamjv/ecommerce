<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:customer',['except'=>['logout']]);
    }

    public function ShowLoginForm(){
        return view('auth.login-customer');
    }

    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|string',
            'password'=>'required',
        ]);
        if(Auth::guard('customer')
                ->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember) ||
            Auth::guard('customer')
                ->attempt(['username'=>$request->email,'password'=>$request->password],$request->remember)) {
            return redirect()->intended(route('customer.home'));
        }
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout(){
        Auth::guard('customer')->logout();
        return redirect('/');
    }
}
