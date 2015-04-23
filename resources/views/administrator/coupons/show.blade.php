@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')
    <ol class="breadcrumb">
        <li><a href="{{action('Admin\AdministratorController@index') }}">Administrative Home</a></li>
        <li><a href="{{action('Admin\CouponController@index') }}">Coupon Management</a></li>
        <li class="active">Coupon</li>
    </ol>
    <h3>Coupon Details</h3>
    <div>
        <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(200)->generate($coupon->access_code))}} ">
        <p>Access Code:{{$coupon->access_code}}</p>
        <p>{{$coupon->status}}</p>
    </div>





    <article>
    <a href="{{action('Admin\CouponController@index') }}"> <h6>Back to Coupon Management</h6></a>
    </article>

    @include('errors.list')
@endsection
