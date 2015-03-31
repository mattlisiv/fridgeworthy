@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')


    <h4>Edit {{$business->name}} Information</h4>
    {!! Form::model($business,['action'=>['BusinessController@update',$business->id],'method'=>'PATCH']) !!}
    @include('businesses.partials.form',['submitButtonText'=> 'Edit Business'])

    {!! Form::close() !!}
    <br>
    @include('errors.list')
    <br>
    <a href="{{action('BusinessController@show',[$business->id]) }}" class="btn btn-default">Back to {{$business->name}}</a>
    <br>
    <br>
@endsection