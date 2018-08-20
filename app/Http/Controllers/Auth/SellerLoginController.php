<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SellerLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:seller',['except'=>['logout']]);
    }


    public function ShowLoginForm(){
        return view('auth.login-seller');
    }

    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|string',
            'password'=>'required',
        ]);

       if(Auth::guard('seller')
           ->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)
           ||
           Auth::guard('seller')
               ->attempt(['username'=>$request->email,'password'=>$request->password],$request->remember))
       {
           return redirect()->intended(route('seller.home'));
       }
       return redirect()->back()->withInput($request->only('email','remember'));
    }


    public function logout(){
        Auth::guard('seller')->logout();
        return redirect('/');
    }
}
