@extends('static.staticmaster')


@section('content')

    @include('administrator.partials.navbar')


    <h1>Create a Coupon</h1>

    {!! Form::open(['url'=>'coupons','files'=>'true']) !!}
    @include('administrator.coupons.partials.form',['submitButtonText'=> 'Create Coupons'])
    {!! Form::close() !!}
    <br>

    @include('errors.list')
    <br>
    <a href="{{action('Admin\CouponController@index')}}" class="btn btn-default">Back to Coupon List</a>
    <br>
    <br>

@endsection

