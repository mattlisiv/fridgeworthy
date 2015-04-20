@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')


    <h4>Edit {{$reward->name}} Information</h4>
    {!! Form::model($reward,['action'=>['Admin\RewardController@update',$reward->id],'method'=>'PATCH']) !!}
    @include('administrator.rewards.partials.form',['submitButtonText'=> 'Edit Reward'])

    {!! Form::close() !!}
    <br>
    @include('errors.list')
    <br>
    <a href="{{action('Admin\RewardController@show',[$reward->id]) }}" class="btn btn-default">Back to Reward Information</a>
    <br>
    <br>
@endsection