<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use App\ProductImages;
use App\Product;
use App\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['only' => ['ShowProductByRegisterKey']]);
    }

    public function ShowProductForm()
    {
        $categories = ProductCategory::all();
        return view('product.create')
            ->with('sellerInfo', Auth::guard('seller')->user())
            ->with('categories', $categories);
    }


    public function SubmitProduct(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'string|max:5000',
            'price' => 'required|numeric|min:0|max:100000000',
            'count' => 'required|numeric|min:0|max:1000',
            'location' => 'required|alpha|string|max:255',
            'category' => 'required|numeric|max:255',
        ]);

        $product = new Product();

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->count = $request->count;
        $product->location = $request->location;
        $product->category_id = $request->category;
        $product->seller_id = Auth::guard('seller')->user()->id;

        if (!$product->save()) {
            return back()->with('status', 'Failed . ');
        }

        return redirect(route('seller.home'))->with('status', 'Done . ');
    }

    public function ShowByRegisterKey($username, $id)
    {
        $seller = Seller::all()->where('username', $username)->first();
        $product = Product::all()->where('id', $id)->where('seller_id', $seller->id)->first();
        return view('product.show')->with('product', $product);
    }

    public function ShowEditForm($username, $id)
    {

        $product = Product::all()
            ->where('id', $id)
            ->where('seller_id', Auth::guard('seller')->user()->id)
            ->first();

        $categories = ProductCategory::all();
        return view('product.edit')
            ->with('product', $product)
            ->with('categories', $categories);
    }


    public function SubmitEdit(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|numeric',
            'title' => 'required|string',
            'description' => 'string|max:5000',
            'price' => 'required|numeric|min:0|max:100000000',
            'count' => 'required|numeric|min:0|max:1000',
            'location' => 'required|alpha|string|max:255',
            'category' => 'required|numeric|max:255',
        ]);

        $product = Product::all()->where('id', $request->id)->first();

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->count = $request->count;
        $product->location = $request->location;
        $product->category_id = $request->category;

        if (!$product->save()) {
            return back()->with('status', 'Failed . ');
        }
        return back()->with('status', 'Done . ');
    }

    public  function DeleteImagesOfProduct($product){
        foreach ($product->images as $image){
            if($image->src == 'no-image.svg'){
                continue;
            }

            $src = public_path('images/products').'/'.$image->src;
            if (\File::exists($src)) {
                if (!\File::delete($src)) {
                    return back()->with('status', 'A error');
                }
            }
        }
    }

    public function DestroyById($username, $id)
    {
        $product = Product::all()
            ->where('id', $id)
            ->where('seller_id', Auth::guard('seller')->user()->id)
            ->first();

        $this->DeleteImagesOfProduct($product);

        $product = Product::all()
            ->where('id', $id)
            ->where('seller_id', Auth::guard('seller')->user()->id)
            ->first()
            ->delete();

        if (!$product) {
            return back()->with('status', 'Failed . ');
        }
        return back()->with('status', 'Done . ');
    }

    public function ShowManageImageForm($username, $id)
    {
        $product = Product::all()
            ->where('id', $id)
            ->where('seller_id', Auth::guard('seller')->user()->id)->first();
        return view('product.manage-image')->with('product', $product);
    }


    public function AddImage(Request $request, $username, $id)
    {
        if($request->MainImage){
            $product = Product::all()->where('id',$id)
                ->where('seller_id',Auth::guard('seller')->user()->id)
                ->first();

            $images = ProductImages::where('product_id',$product->id)
                ->update(['isMain'=>0]);

            $images = ProductImages::where('product_id',$product->id)
                ->where('id',$request->MainImage)
                ->update(['isMain'=>1]);
        }


        $product = Product::all()
            ->where('id', $id)
            ->where('seller_id', Auth::guard('seller')->user()->id)
            ->first();

        if ($request->file('image')) {
            //Select The Last Number for new RegisterKey
            $count = ProductImages::all()->last()->id;
            $count *= 20;

            if ($request->file('image')->getClientOriginalExtension() == 'jpg' || $request->file('image')->getClientOriginalExtension() == 'png') {
                if (($request->file('image')->getMimeType() == 'image/jpeg' || $request->file('image')->getMimeType() == 'image/png')) {
                    $image = $request->file('image');
                    $name = $count . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/images/products/');
                    $image->move($destinationPath, $name);

                    //Save to db
                    $image = new ProductImages();
                    $image->product_id = $product->id;
                    $image->src = $name;
                    if (!$image->save()) {
                        die('error');
                    }

                } else {
                    return back()->with('status', 'ProductImages type is not valid .');
                }
            } else {
                return back()->with('status', 'ProductImages type is not valid .');
            }
        }

        return back()->with('status', 'Done . ');
    }

    public function DestroyImage($username, $id, $image_id)
    {
        $product = Product::all()
            ->where('seller_id', Auth::guard('seller')->user()->id)
            ->where('id', $id)->first();

        $image = ProductImages::all()
            ->where('id', $image_id)
            ->where('product_id', $product->id)
            ->first();

        $path = $image->src;
        if($path == 'no-image.svg'){
            return back()->with('status', 'Faild . ');
        }

        $image_path = public_path() . '/images/products/'.$path;

        if (!$image->delete()) {
            return back()->with('status', 'A error');
        }

        if (\File::exists($image_path)) {
            if (!\File::delete($image_path)) {
                return back()->with('status', 'A error');
            }
        }

        return back()->with('status', 'Done . ');
    }

    public function SelectMainImage($username,$registerKey,Request $request){
        dd($username,$registerKey,$request->MainImage);
    }

    public function DestroyMainImage($username,$registerKey){
        $product = Product::where('seller_id',Auth::guard('seller')->user()->id)
            ->where('registerKey',$registerKey)
            ->update(['mainImage_path'=>'no-image.svg']);
        return back()->with('status', 'Done . ');
    }

}
