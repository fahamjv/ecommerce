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

                        <br>


                        <form class="form-horizontal" method="POST" action="{{ route('product.add-image.submit',['username'=>Auth::guard('seller')->user()->username,'id'=>$product->id]) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Select Main Image</th>
                                    <th scope="col">Delete</th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php $counter = 0 ?>

                                @foreach($product->images as $image)
                                    <?php $counter+=1 ?>

                                    @if($image->isMain!=0)
                                        <tr>
                                            <th scope="row"><?php echo $counter ?>-Main Image</th>
                                            <td><img src="http://127.0.0.1:8000/images/products/{{$image->src}}" width="500px" height="300px"></td>
                                            <td><label><input type="radio" name="MainImage" value="{{$image->id}}" checked>Set as Main Image</label></td>
                                        </tr>
                                    @else
                                        <tr>
                                            <th scope="row"><?php echo $counter ?></th>
                                            <td><img src="http://127.0.0.1:8000/images/products/{{$image->src}}" width="500px" height="300px"></td>
                                            <td><label><input type="radio" name="MainImage" value="{{$image->id}}">Set as Main Image</label></td>
                                            <td>
                                                <form method="post" action="{{route('product.destroy-image',['username'=>Auth::guard('seller')->user()->username,'id'=>$product->id,'image_id'=>$image->id])}}">
                                                    {{csrf_field()}}
                                                    <button type="submit">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Image</label>
                                <div class="col-md-6">
                                    <input type="file" name="image" class="form-control-file" id="image">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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
