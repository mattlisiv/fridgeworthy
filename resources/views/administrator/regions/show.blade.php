@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')
    <div class="row">
        <div class="col-lg-8">
            <ol class="breadcrumb">
                <li><a href="{{action('Admin\AdministratorController@index') }}">Administrative Home</a></li>
                <li><a href="{{action('Admin\RegionController@index') }}">Region Management</a></li>
                <li class="active">{{$region->name}}</li>
            </ol>
             <h1>{{$region->name}}</h1>
             <p>No statistics provided for {{$region->name}}</p>
             <a href="{{action('Admin\RegionController@index') }}"> <h6>Back to Region Management</h6></a>
        </div>
        <div class="col-lg-3 col-lg-offset-1" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Region</div>
                <div class="panel-body">
                    {!! Form::open(['action'=>['Admin\RegionController@edit',$region->id], 'method' => 'GET']) !!}
                    {!! Form::submit('Edit Region',['class' => 'btn btn-primary form-control']) !!}
                    {!! Form::close() !!}
                    <br>
                    {!! Form::open(['action'=>['Admin\RegionController@destroy',$region->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Delete Region',['class' => 'btn btn-danger form-control']) !!}
                    {!! Form::close() !!}             
                </div>
            </div>
        </div>
    </div>
    @include('errors.list')
@endsection
