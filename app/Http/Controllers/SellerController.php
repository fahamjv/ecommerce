<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use App\Product;
use App\ProductImages;
use App\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class SellerController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:seller', ['except' => ['ShowSellerPage']]);
    }

    public function index()
    {
        $products = Product::where('seller_id', Auth::guard('seller')->user()->id)
            ->orderBy('id', 'DESC')
            ->get();
        $categories = ProductCategory::all();

        return view('seller.home')
            ->with('products', $products)
            ->with('categories', $categories)
            ->with('sellerInfo', Auth::guard('seller')->user());
    }

    public function ShowEditForm()
    {
        return view('seller.setting')
            ->with('sellerInfo', Auth::guard('seller')->user());
    }

    public function SubmitEdit(Request $request)
    {
        $this->validate($request, [
            'name' => 'nullable|alpha',
            'family' => 'nullable|alpha',
            'email' => 'required|string|email',
            'username' => 'required|alpha_dash|string',
            'bio' => 'nullable|string|max:100',
            'website' => 'nullable|url',
            'city' => 'nullable|alpha|min:2',
            'NationalCode' =>array('nullable','numeric', 'regex:/^\d{10}$/'),
            'phone' => 'nullable|regex:/[0-9]{9}/',
            'avatar' => 'image|mimes:jpeg,png,jpg|max:2048',
            'wallpaper' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $seller = Auth::guard('seller')->user();
        $avatar = $seller->avatar;
        $wallpaper = $seller->wallpaper;

        if ($request->file('avatar')) {
            if ($request->file('avatar')->getClientOriginalExtension() == 'jpg' || $request->file('avatar')->getClientOriginalExtension() == 'png') {
                if (($request->file('avatar')->getMimeType() == 'image/jpeg' || $request->file('avatar')->getMimeType() == 'image/png')) {
                    $avatar = $request->file('avatar');
                    $name = 'avatar-' . $seller->id . '.' . $avatar->getClientOriginalExtension();
                    $destinationPath = public_path('/images/sellers/');
                    $avatar->move($destinationPath, $name);
                    $avatar = $name;
                } else {
                    return back()->with('status', 'Avatar type is not valid .');
                }
            } else {
                return back()->with('status', 'Avatar type is not valid .');
            }
        }


        if ($request->file('wallpaper')) {
            if ($request->file('wallpaper')->getClientOriginalExtension() == 'jpg' || $request->file('wallpaper')->getClientOriginalExtension() == 'png') {
                if (($request->file('wallpaper')->getMimeType() == 'image/jpeg' || $request->file('wallpaper')->getMimeType() == 'image/png')) {
                    $wallpaper = $request->file('wallpaper');
                    $name = 'wallpaper-' . $seller->id . '.' . $wallpaper->getClientOriginalExtension();
                    $destinationPath = public_path('/images/sellers/');
                    $wallpaper->move($destinationPath, $name);
                    $wallpaper = $name;
                } else {
                    return back()->with('status', 'Wallpaper type is not valid .');
                }
            } else {
                return back()->with('status', 'Wallpaper type is not valid .');
            }
        }

        $seller = Seller::where('id', Auth::guard('seller')->user()->id)->update(['name' => $request->name,
            'family' => $request->family,
            'email' => $request->email,
            'username' => $request->username,
            'bio' => $request->bio,
            'website' => $request->website,
            'city' => $request->city,
            'avatar' => $avatar,
            'NationalCode' => $request->NationalCode,
            'phone' => $request->phone,
            'wallpaper' => $wallpaper]);

        if (!$seller) {
            return back()->with('status', 'Failed . ');
        }

        return back()->with('status', 'Save Profile done  . ');
    }

    public function ShowSellerPage($username)
    {
        $seller = Seller::all()
            ->where('username', $username)
            ->first();
        $products = Product::where('seller_id', $seller->id)->orderBy('id', 'desc')->get();
        $categories = ProductCategory::all();
        return view('seller.page')
            ->with('products', $products)
            ->with('categories', $categories)
            ->with('seller', $seller);
    }
}
