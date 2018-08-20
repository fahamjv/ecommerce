<?php

namespace App\Http\Controllers\Auth;

use App\Seller;
use App\User;
use App\Http\Controllers\Controller;
//use http\Env\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendActiveCode;

class SellerRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */



    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/seller';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255|unique:sellers',
            'email' => 'required|string|email|max:255|unique:sellers',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function ShowRegisterForm(){
        return view('auth.register-seller');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function getToken()
    {
        return rand(10000,99999);
    }


    protected function create(Request $request)
    {
        $this->validator($request->all())->validate();

        $seller = Seller::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'activation_code' => $this->getToken(),
            'avatar'=>'no_avatar.jpg',
            'wallpaper'=>'no_avatar.jpg',
        ]);


        Mail::to($seller)->send(new SendActiveCode($seller));

        //Auth::guard('seller')->login($seller);
        return redirect(route('seller.active',['email'=>$seller->email]));
    }

    public function ShowActiveForm($email){
        //Redirect if Seller emailVerified be not 0
        $seller = Seller::where('email',$email)->first();
        if($seller->emailVerified != 0){
            return abort(404);
        }

        return view('auth.active-seller')->with('email',$email);
    }

    public function active(Request $request){

        $seller = Seller::where('email',$request->email)->first();

        //Error if Seller emailVerified be not 0
        if($seller->emailVerified != 0){
            return back()->with('status','Failed . you are active now ');
        }

        //Compare The Active Code
        if(intval($request->activeNumber) != $seller->activation_code){
            return back()->with('status','Failed . ');
        }

        Seller::where('id', $seller->id)
            ->update(['emailVerified'=>1]);

        Auth::guard('seller')->login($seller);
        return redirect()->intended(route('seller.home'));
    }
}
