@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')
    <div class="row">
        <div class="col-lg-8">
            <ol class="breadcrumb">
                <li><a href="{{action('Admin\AdministratorController@index') }}">Administrative Home</a></li>
                <li><a href="{{action('Admin\CouponController@index') }}">Coupon Management</a></li>
                <li class="active">Coupon</li>
            </ol>
            <h3>Coupon for {{$coupon->reward->name}}</h3>
                <div class="panel panel-default">
                    <div class="panel-heading">Coupon Details</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                @if(!$coupon->coupon_type=='imaged')
                                <p>Access Code:{{$coupon->access_code}}</p>
                                @endif
                                <p>Status: {{$coupon->status}}</p>
                                @if($coupon->user)
                                        <p>Coupon claimed by: <span><a href="{{action('Admin\UserController@show',$coupon->user->id)}}">{{$coupon->user->fullname}}</a></span></p>
                                    @else
                                        <p>No user has claimed this coupon.</p>
                                @endif
                                <p><a href="{{action('Admin\RewardController@show',$coupon->reward->id)}}">View Reward Information</a></p>
                            </div>
                            <div class="col-lg-2 col-lg-offset-2">
                                <button class="btn btn-default"><a target="_blank" href="{{action('Admin\CouponController@preview',$coupon->id)}}">Preview Coupon</a></button>
                            </div>

                        </div>
                    </div>
                </div>

        </div>
        <div class="col-lg-3 col-lg-offset-1">

        </div>
    </div>


    @include('errors.list')
@endsection
