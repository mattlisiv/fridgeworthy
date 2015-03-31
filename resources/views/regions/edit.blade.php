@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')


    <h4>Edit {{$region->name}} Information</h4>
    {!! Form::model($region,['action'=>['RegionController@update',$region->id],'method'=>'PATCH']) !!}
    @include('regions.partials.form',['submitButtonText'=> 'Edit region'])

    {!! Form::close() !!}
    <br>
    @include('errors.list')
    <br>
    <a href="{{action('RegionController@show',[$region->id]) }}" class="btn btn-default">Back to {{$region->name}}</a>
    <br>
    <br>
@endsection