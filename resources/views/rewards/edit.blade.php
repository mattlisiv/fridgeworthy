@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')


    <h4>Edit {{$reward->name}} Information</h4>
    {!! Form::model($reward,['action'=>['RewardController@update',$reward->id],'method'=>'PATCH']) !!}
    @include('rewards.partials.form',['submitButtonText'=> 'Edit Reward'])

    {!! Form::close() !!}
    <br>
    @include('errors.list')
    <br>
    <a href="{{action('RewardController@show',[$reward->id]) }}" class="btn btn-default">Back to Reward Information</a>
    <br>
    <br>
@endsection