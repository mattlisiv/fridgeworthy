@extends('static.staticmaster')


@section('content')

    @include('administrator.partials.navbar')


    <h1>Create a New Reward</h1>

    {!! Form::open(['url'=>'rewards','files'=>true]) !!}
    @include('administrator.rewards.partials.form',['submitButtonText'=> 'Create Reward'])
    {!! Form::close() !!}
    <br>

    @include('errors.list')
    <br>
    <a href="{{action('Admin\RewardController@index')}}" class="btn btn-default">Back to Rewards</a>
    <br>
    <br>

@endsection