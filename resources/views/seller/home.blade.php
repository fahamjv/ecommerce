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


                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Price</th>
                                <th scope="col">Category</th>
                                <th scope="col">Count</th>
                                <th scope="col">Level</th>
                                <th scope="col">Image</th>
                                <th scope="col">Manage Image</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $counter = 0 ?>
                            @foreach($products as $product)
                                <?php $counter+=1 ?>
                                <tr>
                                <th scope="row"><?php echo $counter ?></th>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>${{$product->price}}</td>
                                    <td>{{$categories->where('id',$product->category_id)->first()->title}}</td>
                                    <td>{{$product->count}}</td>
                                    <td>{{$product->level}}</td>
                                    <td><a href="{{route('product.show',['username'=>$sellerInfo->username,'id'=>$product->id])}}"><img src="{{ReturnMainImageOfProduct($product)}}" width="70px" height="50px"></a></td>
                                    <td><a href="{{route('product.add-image',['username'=>$sellerInfo->username,'id'=>$product->id])}}">Manage image</a></td>
                                    <td><a href="{{route('product.edit',['username'=>$product->seller($product->seller_id)->username,'id'=>$product->id])}}">Edit</a></td>
                                    <td>
                                        <form action="{{route('product.destroy',['username'=>$sellerInfo->username,'id'=>$product->id])}}" method="post">
                                            {{csrf_field()}}
                                            <button type="submit">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
