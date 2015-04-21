@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')
    <div clas="row">
        <div class="col-lg-8">
            <table class="table table-bordered">
                <tr><th>Reward</th><th>Access Code</th><th>Status</th></tr>
                @foreach($coupons as $coupon)
                    <tr>
                        <td><a href="{{action('Admin\RewardController@show',[$coupon->reward->id])}}">{{$coupon->reward->name}}</a></td>
                        <td><a href="{{action('Admin\CouponController@show',[$coupon->id])}}">{{$coupon->access_code}}</a></td>
                        <td>{{$coupon->status}}</td>
                    </tr>
                @endforeach
            </table>        
        </div>
        <div class="col-lg-3 col-lg-offset-1" style="padding-top: 50px;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="{{action('Admin\CouponController@create') }}"> <h4>Create New Coupons</h4></a>
                    <p>Current Number of Coupons: {{$coupons->count()}}</p>
                </div>
        </div>
    </div>
@endsection
