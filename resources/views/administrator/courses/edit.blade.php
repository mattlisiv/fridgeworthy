@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')


    <h4>Edit {{$course->name}} Information</h4>
    {!! Form::model($course,['action'=>['Admin\CourseController@update',$course->id],'method'=>'PATCH']) !!}
    @include('administrator.courses.partials.editform',['submitButtonText'=> 'Edit Course'])

    {!! Form::close() !!}
    <br>
    @include('errors.list')
    <br>
    <a href="{{action('Admin\CourseController@show',[$course->id])}}" class="btn btn-default">Back to {{$course->name}}</a>
    <br>
    <br>
@endsection