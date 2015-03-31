@extends('static.staticmaster')


@section('content')

    @include('administrator.partials.navbar')


    <h1>Create a New District</h1>

    {!! Form::open(['url'=>'admin/districts']) !!}
      @include('districts.partials.form',['submitButtonText'=> 'Create District'])
    {!! Form::close() !!}
    <br>

    @include('errors.list')
    <br>
    <a href="{{action('DistrictController@index')}}" class="btn btn-default">Back to Districts</a>
    <br>
    <br>

@endsection