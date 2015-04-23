@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')
    <div class="row">
        <div class="col-lg-8">
            <ol class="breadcrumb">
                <li><a href="{{action('Admin\AdministratorController@index') }}">Administrative Home</a></li>
                <li><a href="{{action('Admin\UserController@index') }}">User Management</a></li>
                <li class="active">{{$user->first_name}} {{$user->last_name}}</li>
            </ol>

            <h3>{{$user->first_name}} {{$user->last_name}}</h3>
            @if(get_class($user)=='App\Student')
                    @include('administrator.users.partials.studentinfo')
                @elseif(get_class($user)=='App\Admin')
                    @include('administrator.users.partials.admininfo')
                @elseif(get_class($user)=='App\BusinessManager')
                @include('administrator.users.partials.businessmanagerinfo')
            @elseif(get_class($user)=='App\Guardian')
                @include('administrator.users.partials.parentinfo')
                @elseif(get_class($user)=='App\Teacher')
                @include('administrator.users.partials.teacherinfo')

            @endif
        </div>
        <div class="col-lg-3 col-lg-offset-1" style="padding-top: 50px;">
            <div class="panel panel-default">
                <div class="panel-heading">Edit User</div>
                <div class="panel-body">
                    {!! Form::open(['action'=>['Admin\UserController@edit',$user->id], 'method' => 'GET']) !!}
                    {!! Form::submit('Edit User Information',['class' => 'btn btn-primary form-control']) !!}
                    {!! Form::close() !!}
                    <br>
                    {!! Form::open(['action'=>['Admin\UserController@destroy',$user->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Delete User',['class' => 'btn btn-danger form-control']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    @include('errors.list')
@endsection
