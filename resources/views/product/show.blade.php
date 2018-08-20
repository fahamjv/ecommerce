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



                        <p>{{$product}}</p>

                        <img src="{{ReturnMainImageOfProduct($product)}}" width="500px" height="300px">


                    {{var_dump($product->images)}}

                        @foreach($product->images as $image)
                            <br/>
                            <br/>
                            <img src="http://127.0.0.1:8000/images/products/{{$image->src}}" width="500px" height="300px">
                        @endforeach






                </div>
            </div>
        </div>
    </div>
</div>
@endsection
