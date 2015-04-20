@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')


    <h4>Edit {{$school->name}} Information</h4>
    {!! Form::model($school,['action'=>['Admin\SchoolController@update',$school->id],'method'=>'PATCH']) !!}
    @include('administrator.schools.partials.form',['submitButtonText'=> 'Edit School'])

    {!! Form::close() !!}
    <br>
    @include('errors.list')
    <br>
    <a href="{{action('Admin\SchoolController@show',[$school->id]) }}" class="btn btn-default">Back to {{$school->name}}</a>
    <br>
    <br>
@endsection