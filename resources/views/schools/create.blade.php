@extends('static.staticmaster')


@section('content')

    @include('administrator.partials.navbar')


    <h1>Create a New School</h1>

    {!! Form::open(['url'=>'admin/schools']) !!}
    @include('schools.partials.form',['submitButtonText'=> 'Create School'])
    {!! Form::close() !!}
    <br>

    @include('errors.list')
    <br>
    <a href="{{action('SchoolController@index')}}" class="btn btn-default">Back to Schools</a>
    <br>
    <br>

@endsection