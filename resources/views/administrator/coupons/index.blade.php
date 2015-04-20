@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')

    <table class="table table-bordered">
        <tr><th>ID</th><th>Reward</th><th>Access Code</th><th>Status</th></tr>
        @foreach($coupons as $coupon)
            <tr>
                <td>{{$coupon->id}}</td>
                <td>{{$coupon->reward->name}}</td>
                <td>{{$coupon->access_code}}</td>
                <td>{{$coupon->status}}</td>
                <td><a href="{{action('CouponController@show',[$coupon->id])}}">Select</a></td>
            </tr>
            @endforeach
    </table>

    <a href="{{action('CouponController@create') }}"> <h6>Create New Coupon</h6></a>

@endsection