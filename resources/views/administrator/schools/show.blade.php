@extends('static.staticmaster')

@section('content')
    @include('administrator.partials.navbar')

    <div class="row">
        <div class="col-lg-8">
            <ol class="breadcrumb">
                <li><a href="{{action('Admin\AdministratorController@index') }}">Administrative Home</a></li>
                <li><a href="{{action('Admin\SchoolController@index') }}">School Management</a></li>
                <li class="active">{{$school->name}}</li>
            </ol>
            <h1>{{$school->name}}</h1>
            <br>
            <a href="{{action('Admin\SchoolController@index') }}"> <h6>Back to School Management</h6></a>
        </div>
        <div class="col-lg-3 col-lg-offset-1" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">Edit School</div>
                <div class="panel-body">
                    {!! Form::open(['action'=>['Admin\SchoolController@edit',$school->id], 'method' => 'GET']) !!}
                    {!! Form::submit('Edit School',['class' => 'btn btn-primary form-control']) !!}
                    {!! Form::close() !!}
                    <br>
                    {!! Form::open(['action'=>['Admin\SchoolController@destroy',$school->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Delete School',['class' => 'btn btn-danger form-control']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @include('errors.list')

@endsection
