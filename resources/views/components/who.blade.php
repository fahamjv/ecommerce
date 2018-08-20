@if(Auth::guard('seller')->check())
    <p class="alert-success">
        you are logged in as a <strong>seller</strong>
    </p>
@else
    <p class="alert-danger">
        you are logged out as a <strong>seller</strong>
    </p>
@endif

@if(Auth::guard('customer')->check())
    <p class="alert-success">
        you are logged in as a <strong>Customer</strong>
    </p>
@else
    <p class="alert-danger">
        you are logged out as a <strong>Customer</strong>
    </p>
@endif


@if(Auth::guard('web')->check())
    <p class="alert-success">
        you are logged in as a <strong>user</strong>
    </p>
@else
    <p class="alert-danger">
        you are logged out as a <strong>user</strong>
    </p>
@endif