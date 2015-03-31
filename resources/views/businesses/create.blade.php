@extends('static.staticmaster')


@section('content')

    @include('administrator.partials.navbar')


    <h1>Create a New Business</h1>

    {!! Form::open(['url'=>'admin/businesses']) !!}
    @include('businesses.partials.form',['submitButtonText'=> 'Create Business'])
    {!! Form::close() !!}
    <br>

    @include('errors.list')
    <br>
    <a href="{{action('BusinessController@index')}}" class="btn btn-default">Back to Businesses</a>
    <br>
    <br>

@endsection