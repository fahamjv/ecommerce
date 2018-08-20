<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function seller($seller_id){
        return $seller = \App\Seller::all()->where('id',$seller_id)->first();
    }


    public function category($category_id){
        return $category = \App\ProductCategory::all()->where('id',$category_id)->first();
    }


    public function images(){
        return $this->hasMany('App\ProductImages','product_id','id');
    }
}
