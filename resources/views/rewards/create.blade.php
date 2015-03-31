@extends('static.staticmaster')


@section('content')

    @include('administrator.partials.navbar')


    <h1>Create a New Reward</h1>

    {!! Form::open(['url'=>'admin/rewards']) !!}
    @include('rewards.partials.form',['submitButtonText'=> 'Create Reward'])
    {!! Form::close() !!}
    <br>

    @include('errors.list')
    <br>
    <a href="{{action('RewardController@index')}}" class="btn btn-default">Back to Rewards</a>
    <br>
    <br>

@endsection