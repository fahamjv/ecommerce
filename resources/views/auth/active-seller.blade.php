@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Seller Login</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('seller.active.submit',['email'=>$email]) }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="email" value="{{$email}}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Active Code</label>

                            <div class="col-md-6">
                                <input id="activeNumber" type="number" class="form-control" name="activeNumber" value="{{ old('activeNumber') }}" required autofocus autocomplete="off">

                                @if ($errors->has('activeNumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('activeNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Active
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
