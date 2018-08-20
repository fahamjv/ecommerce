@extends('layouts.app-username-instead-name')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Seller Dashboard</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        @component('components.seller-menu')
                        @endcomponent

                        <hr>
                        <br>

                        <img src="{{ReturnMainImageOfProduct($product)}}" width="500px" height="300px" class="img-responsive center-block">

                        <br>
                        <hr>

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" method="POST" action="{{ route('product.edit.submit',['username'=>Auth::guard('seller')->user()->username,'id'=>$product->id]) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{$product->id}}">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Title</label>

                                <div class="col-md-6">
                                    <input  value="{{$product->title}}" id="title" type="text" class="form-control" name="title" autocomplete="off" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Description</label>
                                <div class="col-md-6">
                                    <div class="md-form mb-4 pink-textarea active-pink-textarea">
                                        <i class="fa fa-angle-double-right prefix"></i>
                                        <textarea type="text" id="description" name="description" class="md-textarea form-control" rows="3">{{$product->description}}</textarea>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Price</label>

                                <div class="col-md-6">
                                    <input  value="{{$product->price}}" id="price" type="number" class="form-control" name="price" autocomplete="off" >

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Count</label>

                                <div class="col-md-6">
                                    <input value="{{$product->count}}" id="email" type="number" class="form-control" name="count" autocomplete="off" >

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Location</label>

                                <div class="col-md-6">
                                    <input value="{{$product->location}}" id="email" type="text" class="form-control" name="location" autocomplete="off">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Category</label>

                                <div class="col-md-6">
                                    <select class="selectpicker" data-live-search="true" name="category">
                                        @foreach($categories as $category)
                                            @if($product->category_id == $category->id)
                                                <option data-tokens="ketchup mustard" value="{{$category->id}}" selected>{{$category->title}}</option>
                                            @else
                                                <option data-tokens="ketchup mustard" value="{{$category->id}}">{{$category->title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
