@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')


    <h4>Edit {{$district->name}} Information</h4>
    {!! Form::model($district,['action'=>['DistrictController@update',$district->id],'method'=>'PATCH']) !!}
    @include('districts.partials.form',['submitButtonText'=> 'Edit District'])

    {!! Form::close() !!}
    <br>
    @include('errors.list')
    <br>
    <a href="{{action('DistrictController@show',[$district->id]) }}" class="btn btn-default">Back to {{$district->name}}</a>
    <br>
    <br>
@endsection