@extends('layouts.app-username-instead-name')

@section('content')
    <style>
        .active-pink-textarea.md-form label.active {
            color: #f48fb1;
        }
        .pink-textarea textarea.md-textarea:focus:not([readonly]) {
            border-bottom: 1px solid #f48fb1;
            box-shadow: 0 1px 0 0 #f48fb1;
        }
        .pink-textarea.md-form .prefix.active {
            color: #f48fb1;
        }

        .active-amber-textarea.md-form label.active {
            color: #ffa000;
        }
        .amber-textarea textarea.md-textarea:focus:not([readonly]) {
            border-bottom: 1px solid #ffa000;
            box-shadow: 0 1px 0 0 #ffa000;
        }
        .amber-textarea.md-form .prefix.active {
            color: #ffa000;
        }

        .active-pink-textarea-2 textarea.md-textarea {
            border-bottom: 1px solid #f48fb1;
            box-shadow: 0 1px 0 0 #f48fb1;
        }
        .active-pink-textarea-2.md-form label.active {
            color: #f48fb1;
        }
        .active-pink-textarea-2.md-form label {
            color: #f48fb1;
        }
        .active-pink-textarea-2.md-form .prefix {
            color: #f48fb1;
        }

        .active-amber-textarea-2 textarea.md-textarea {
            border-bottom: 1px solid #ffa000;
            box-shadow: 0 1px 0 0 #ffa000;
        }
        .active-amber-textarea-2.md-form label.active {
            color: #ffa000;
        }
        .active-amber-textarea-2.md-form label {
            color: #ffa000;
        }
        .active-amber-textarea-2.md-form .prefix {
            color: #ffa000;
        }
    </style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Product</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        @component('components.seller-menu')
                        @endcomponent

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" method="POST" action="{{ route('product.create.submit',['username'=>$sellerInfo->username]) }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Title</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title" autocomplete="off" value="{{old('title')}}" autofocus>

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Description</label>
                                <div class="col-md-6">
                                    <div class="md-form mb-4 pink-textarea active-pink-textarea">
                                        <i class="fa fa-angle-double-right prefix"></i>
                                        <textarea type="text" name="description" class="md-textarea form-control" rows="3">{{old('description')}}</textarea>
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
                                    <input type="number" class="form-control" name="price" autocomplete="off" value="{{old('price')}}">

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
                                    <input type="number" class="form-control" name="count" autocomplete="off" value="{{old('count')}}">

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
                                    <input type="text" class="form-control" name="location" autocomplete="off" value="{{old('location')}}">

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
                                            <option data-tokens="ketchup mustard" value="{{$category->id}}">{{$category->title}}</option>
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
