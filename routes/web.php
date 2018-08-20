<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    function whoami(){
        return ['seller'=>Auth::guard('seller')->check(),
            'customer'=>Auth::guard('customer')->check(),
            'web'=>Auth::guard('web')->check()];
    }
    return view('welcome')->with('whoami',whoami());
});


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('user/logout', 'HomeController@logoutUser')->name('user.logout');


Route::prefix('seller')->group(function (){
    Route::get('login', 'Auth\SellerLoginController@ShowLoginForm')->name('seller.login');
    Route::post('login', 'Auth\SellerLoginController@login')->name('seller.login.submit');
    Route::get('logout', 'Auth\SellerLoginController@logout')->name('seller.logout');
    Route::get('', 'SellerController@index')->name('seller.home');

    //Register Seller
    Route::get('singup', 'Auth\SellerRegisterController@ShowRegisterForm')->name('seller.register');
    Route::post('singup', 'Auth\SellerRegisterController@create')->name('seller.register.submit');

    Route::get('singup/{email}/active', 'Auth\SellerRegisterController@ShowActiveForm')->name('seller.active');
    Route::post('singup/{email}/active', 'Auth\SellerRegisterController@active')->name('seller.active.submit');

    //Seller Edit
    Route::get('edit', 'SellerController@ShowEditForm')->name('seller.edit');
    Route::post('edit', 'SellerController@SubmitEdit')->name('seller.edit.submit');

    //password reset
    Route::get('password/reset', 'Auth\SellerForgetPasswordController@showLinkRequestForm')->name('seller.password.request');
    Route::post('password/email', 'Auth\SellerForgetPasswordController@sendResetLinkEmail')->name('seller.password.email');

    Route::get('password/reset/{token}', 'Auth\SellerResetPasswordController@showResetForm')->name('seller.password.reset');
    Route::post('password/reset', 'Auth\SellerResetPasswordController@reset');
});

Route::prefix('{username}')->group(function (){
    //Seller Page
    Route::get('', 'SellerController@ShowSellerPage')->name('seller.page');

    //Show Product
    Route::get('PRD-{id}/show', 'ProductController@ShowByRegisterKey')->name('product.show');

    //Edit Product
    Route::get('{registerKey}/edit', 'ProductController@ShowEditForm')->name('product.edit');
    Route::post('{registerKey}/edit', 'ProductController@SubmitEdit')->name('product.edit.submit');

    //Create Product
    Route::get('create', 'ProductController@ShowProductForm')->name('product.create');
    Route::post('create', 'ProductController@SubmitProduct')->name('product.create.submit');

    //Delete Product
    Route::post('{id}/destroy', 'ProductController@DestroyById')->name('product.destroy');

    //Add more ProductImages For Product
    Route::get('{id}/image/manage', 'ProductController@ShowManageImageForm')->name('product.add-image');
    Route::post('{id}/image/add', 'ProductController@AddImage')->name('product.add-image.submit');

    //Delete a Image From a Product
    Route::post('{id}/image/destroy/{image_id}', 'ProductController@DestroyImage')->name('product.destroy-image');

    //Select The Main ProductImages
    Route::post('{id}/image/select', 'ProductController@SelectMainImage')->name('product.select-main-image');

    //Remove The Main ProductImages
    Route::post('{id}/image/destroy', 'ProductController@DestroyMainImage')->name('product.destroy-main-image');


    //Fix the Seller Dashboard
    //Show only products that have the true status
    //Seller register page
    //Make admin Gard , And Admin login , Admin Dashboard
    //Make "," for price input
});



/*Route::prefix('customer')->group(function (){
    Route::get('login', 'Auth\CustomerLoginController@ShowLoginForm')->name('customer.login');
    Route::post('login', 'Auth\CustomerLoginController@login')->name('customer.login.submit');
    Route::get('logout', 'Auth\CustomerLoginController@logout')->name('customer.logout');
    Route::get('', 'CustomerController@index')->name('customer.home');
    Route::get('singup', 'Auth\CustomerRegisterController@ShowRegisterForm')->name('customer.register');
    Route::post('singup', 'Auth\CustomerRegisterController@create')->name('customer.register.submit');

    //password reset
    Route::get('password/reset', 'Auth\CustomerForgetPasswordController@showLinkRequestForm')->name('customer.password.request');
    Route::post('password/email', 'Auth\CustomerForgetPasswordController@sendResetLinkEmail')->name('customer.password.email');

    Route::get('password/reset/{token}', 'Auth\CustomerResetPasswordController@showResetForm')->name('customer.password.reset');
    Route::post('password/reset', 'Auth\CustomerResetPasswordController@reset');
});*/

/*Route::get('buyerTest',function (){
        dd(\Illuminate\Support\Facades\Auth::guard('seller')->check(),
            \Illuminate\Support\Facades\Auth::guard('customer')->check(),
            \Illuminate\Support\Facades\Auth::guard('web')->check());
});*/

/*Route::get('/test/test/test',function(){
    return public_path('images').'/'.'asda';
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
