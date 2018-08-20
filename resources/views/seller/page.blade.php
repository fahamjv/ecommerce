{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--<meta charset="UTF-8">--}}
{{--<meta name="viewport"--}}
{{--content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--<meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--<title>Document</title>--}}
{{--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
{{--<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>--}}
{{--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
{{--<!------ Include the above in your HEAD tag ---------->--}}
{{--<style>--}}
{{--/* FontAwesome for working BootSnippet :> */--}}

{{--@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');--}}
{{--#team {--}}
{{--background: #eee !important;--}}
{{--}--}}

{{--.btn-primary:hover,--}}
{{--.btn-primary:focus {--}}
{{--background-color: #108d6f;--}}
{{--border-color: #108d6f;--}}
{{--box-shadow: none;--}}
{{--outline: none;--}}
{{--}--}}

{{--.btn-primary {--}}
{{--color: #fff;--}}
{{--background-color: #007b5e;--}}
{{--border-color: #007b5e;--}}
{{--}--}}

{{--section {--}}
{{--padding: 60px 0;--}}
{{--}--}}

{{--section .section-title {--}}
{{--text-align: center;--}}
{{--color: #007b5e;--}}
{{--margin-bottom: 50px;--}}
{{--text-transform: uppercase;--}}
{{--}--}}

{{--#team .card {--}}
{{--border: none;--}}
{{--background: #ffffff;--}}
{{--}--}}

{{--.image-flip:hover .backside,--}}
{{--.image-flip.hover .backside {--}}
{{---webkit-transform: rotateY(0deg);--}}
{{---moz-transform: rotateY(0deg);--}}
{{---o-transform: rotateY(0deg);--}}
{{---ms-transform: rotateY(0deg);--}}
{{--transform: rotateY(0deg);--}}
{{--border-radius: .25rem;--}}
{{--}--}}

{{--.image-flip:hover .frontside,--}}
{{--.image-flip.hover .frontside {--}}
{{---webkit-transform: rotateY(180deg);--}}
{{---moz-transform: rotateY(180deg);--}}
{{---o-transform: rotateY(180deg);--}}
{{--transform: rotateY(180deg);--}}
{{--}--}}

{{--.mainflip {--}}
{{---webkit-transition: 1s;--}}
{{---webkit-transform-style: preserve-3d;--}}
{{---ms-transition: 1s;--}}
{{---moz-transition: 1s;--}}
{{---moz-transform: perspective(1000px);--}}
{{---moz-transform-style: preserve-3d;--}}
{{---ms-transform-style: preserve-3d;--}}
{{--transition: 1s;--}}
{{--transform-style: preserve-3d;--}}
{{--position: relative;--}}
{{--}--}}

{{--.frontside {--}}
{{--position: relative;--}}
{{---webkit-transform: rotateY(0deg);--}}
{{---ms-transform: rotateY(0deg);--}}
{{--z-index: 2;--}}
{{--margin-bottom: 30px;--}}
{{--}--}}

{{--.backside {--}}
{{--position: absolute;--}}
{{--top: 0;--}}
{{--left: 0;--}}
{{--background: white;--}}
{{---webkit-transform: rotateY(-180deg);--}}
{{---moz-transform: rotateY(-180deg);--}}
{{---o-transform: rotateY(-180deg);--}}
{{---ms-transform: rotateY(-180deg);--}}
{{--transform: rotateY(-180deg);--}}
{{---webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);--}}
{{---moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);--}}
{{--box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);--}}
{{--}--}}

{{--.frontside,--}}
{{--.backside {--}}
{{---webkit-backface-visibility: hidden;--}}
{{---moz-backface-visibility: hidden;--}}
{{---ms-backface-visibility: hidden;--}}
{{--backface-visibility: hidden;--}}
{{---webkit-transition: 1s;--}}
{{---webkit-transform-style: preserve-3d;--}}
{{---moz-transition: 1s;--}}
{{---moz-transform-style: preserve-3d;--}}
{{---o-transition: 1s;--}}
{{---o-transform-style: preserve-3d;--}}
{{---ms-transition: 1s;--}}
{{---ms-transform-style: preserve-3d;--}}
{{--transition: 1s;--}}
{{--transform-style: preserve-3d;--}}
{{--}--}}

{{--.frontside .card,--}}
{{--.backside .card {--}}
{{--min-height: 312px;--}}
{{--}--}}

{{--.backside .card a {--}}
{{--font-size: 18px;--}}
{{--color: #007b5e !important;--}}
{{--}--}}

{{--.frontside .card .card-title,--}}
{{--.backside .card .card-title {--}}
{{--color: #007b5e !important;--}}
{{--}--}}

{{--.frontside .card .card-body img {--}}
{{--width: 120px;--}}
{{--height: 120px;--}}
{{--border-radius: 50%;--}}
{{--}--}}
{{--</style>--}}
{{--</head>--}}
{{--<body>--}}

{{--<!-- Team -->--}}
{{--<section id="team" class="pb-5">--}}
{{--<div class="container">--}}
{{--<h5 class="section-title h1">products</h5>--}}
{{--<div class="row">--}}
{{--<!-- Team member -->--}}

{{--@foreach($products as $product)--}}

{{--<div class="col-xs-12 col-sm-6 col-md-4">--}}
{{--<div class="image-flip" ontouchstart="this.classList.toggle('hover');">--}}
{{--<div class="mainflip">--}}
{{--<div class="frontside">--}}
{{--<div class="card">--}}
{{--<div class="card-body text-center">--}}
{{--<p><img class=" img-fluid" src="{{$product->mainImage_path}}" alt="card image"></p>--}}
{{--<h4 class="card-title">{{$product->title}}</h4>--}}
{{--<p class="card-text">This is basic card with image on top, title, description and button.</p>--}}
{{--<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="backside">--}}
{{--<div class="card">--}}
{{--<div class="card-body text-center mt-4">--}}
{{--<h4 class="card-title">${{$product->price}}</h4>--}}
{{--<h6 class="card-title">{{$product->count}}</h6>--}}
{{--<h6 class="card-title">{{$product->location}}</h6>--}}
{{--<h6 class="card-title">{{$categories->where('id',$product->category_id)->first()->title}}</h6>--}}
{{--<p class="card-text">{{$product->description}}</p>--}}
{{--<ul class="list-inline">--}}
{{--<li class="list-inline-item">--}}
{{--<a class="social-icon text-xs-center" target="_blank" href="#">--}}
{{--<i class="fa fa-facebook"></i>--}}
{{--</a>--}}
{{--</li>--}}
{{--<li class="list-inline-item">--}}
{{--<a class="social-icon text-xs-center" target="_blank" href="#">--}}
{{--<i class="fa fa-twitter"></i>--}}
{{--</a>--}}
{{--</li>--}}
{{--<li class="list-inline-item">--}}
{{--<a class="social-icon text-xs-center" target="_blank" href="#">--}}
{{--<i class="fa fa-skype"></i>--}}
{{--</a>--}}
{{--</li>--}}
{{--<li class="list-inline-item">--}}
{{--<a class="social-icon text-xs-center" target="_blank" href="#">--}}
{{--<i class="fa fa-google"></i>--}}
{{--</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endforeach--}}
{{--</div>--}}
{{--</div>--}}
{{--</section>--}}
{{--<!-- Team -->--}}
{{--</body>--}}
{{--</html>--}}

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

                        {{--@component('components.who')--}}
                        {{--@endcomponent--}}

                            <br>
                            <br>
                            <br>
                            <img src="http://127.0.0.1:8000/images/sellers/{{$seller->wallpaper}}" width="500px" height="300px">
                            <img src="http://127.0.0.1:8000/images/sellers/{{$seller->avatar}}" width="200px" height="200px">
                            {{var_dump($seller)}}
                            <hr>
                            <hr>
                            <hr>
                        @foreach($products as $product)
                            {{var_dump('ProductCategory',$product->category($product->category_id)->title)}}
                            <br>
                            <br>
                            <tr>
                                <td>
                                    <a href="{{route('product.show',['username'=>$seller->username,'id'=>$product->id])}}">
                                        <img src="{{ReturnMainImageOfProduct($product)}}"
                                         width="500px" height="300px">
                                    </a>
                                </td>
                                <br>
                                <td>
                                <td>{{var_dump($product)}}</td>
                                <hr>
                                <hr>
                            </tr>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection