@extends('static.staticmaster')


@section('content')

    @include('administrator.partials.navbar')


    <h1>Create a New Course</h1>

    {!! Form::open(['url'=>'courses']) !!}
    @include('administrator.courses.partials.form',['submitButtonText'=> 'Create Course'])
    {!! Form::close() !!}
    <br>

    @include('errors.list')
    <br>
    <a href="{{action('Admin\CourseController@index')}}" class="btn btn-default">Back to Courses</a>
    <br>
    <br>

@endsection