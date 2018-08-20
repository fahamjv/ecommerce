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
                <div class="panel-heading">Edit Profile</div>
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


                        <form class="form-horizontal" method="POST" action="{{ route('seller.edit.submit') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input  id="name" type="text" class="form-control" name="name" value="{{ $sellerInfo->name }}" autocomplete="off" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('family') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Family</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="family" value="{{ $sellerInfo->family }}" autocomplete="off">

                                    @if ($errors->has('family'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('family') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $sellerInfo->email }}" autocomplete="off" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Username</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="username" value="{{ $sellerInfo->username }}" autocomplete="off" required>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Bio</label>
                                <div class="col-md-6">
                                    <div class="md-form mb-4 pink-textarea active-pink-textarea">
                                        <i class="fa fa-angle-double-right prefix"></i>
                                        <textarea type="text" name="bio" id="bio" class="md-textarea form-control" rows="3">{{$sellerInfo->bio}}</textarea>
                                    </div>
                                    @if ($errors->has('bio'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Website</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" placeholder="http://www.example.com" class="form-control" name="website" value="{{ $sellerInfo->website }}" autocomplete="off">

                                    @if ($errors->has('website'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">City</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city" value="{{ $sellerInfo->city }}" autocomplete="off">

                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Phone</label>

                                <div class="col-md-6">
                                    <input id="NationalCode" type="tel" class="form-control" name="phone" value="{{ $sellerInfo->phone }}" autocomplete="off">

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('NationalCode') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">National Code</label>

                                <div class="col-md-6">
                                    <input id="NationalCode" maxlength="10" type="text" class="form-control" name="NationalCode" value="{{ $sellerInfo->NationalCode }}" autocomplete="off">

                                    @if ($errors->has('NationalCode'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('NationalCode') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Avatar</label>

                                <div class="col-md-6">
                                    <input type="file" name="avatar" class="form-control-file" id="avatar">

                                    @if ($errors->has('avatar'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('wallpaper') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Wallpaper</label>

                                <div class="col-md-6">
                                    <input type="file" name="wallpaper" class="form-control-file" id="wallapaper">

                                    @if ($errors->has('wallpaper'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('wallpaper') }}</strong>
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
