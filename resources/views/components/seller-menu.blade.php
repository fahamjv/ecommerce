@if(Auth::guard('seller')->check())

<a href="{{route('seller.home')}}">Dashboard</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="{{route('seller.page',['username'=>Auth::guard('seller')->user()->username])}}">Seller Page</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="{{route('product.create',['username'=>Auth::guard('seller')->user()->username])}}">Create</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="{{route('seller.edit')}}">Edit Profile</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="{{route('seller.logout')}}">Logout</a>

@endif