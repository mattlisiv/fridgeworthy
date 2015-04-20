@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')


    <h4>Edit {{$region->name}} Information</h4>
    {!! Form::model($region,['action'=>['Admin\RegionController@update',$region->id],'method'=>'PATCH']) !!}
    @include('administrator.regions.partials.form',['submitButtonText'=> 'Edit region'])

    {!! Form::close() !!}
    <br>
    @include('errors.list')
    <br>
    <a href="{{action('Admin\RegionController@show',[$region->id]) }}" class="btn btn-default">Back to {{$region->name}}</a>
    <br>
    <br>
@endsection