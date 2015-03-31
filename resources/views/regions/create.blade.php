@extends('static.staticmaster')


@section('content')

    @include('administrator.partials.navbar')


    <h1>Create a New Region</h1>

    {!! Form::open(['url'=>'admin/regions']) !!}
    @include('regions.partials.form',['submitButtonText'=> 'Create Region'])
    {!! Form::close() !!}
    <br>

    @include('errors.list')
    <br>
    <a href="{{action('RegionController@index')}}" class="btn btn-default">Back to Regions</a>
    <br>
    <br>

@endsection