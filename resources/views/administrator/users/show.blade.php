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
                    <button type="button" class="btn btn-danger form-control" data-toggle="modal" data-target="#deleteModal"> Delete User</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="deleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="delete">
            <div class="modal-content">
                <div class="modal-content">
                    <div>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this user? </h4>
                        </div>
                        <div class="modal-body">
                            <p>
                                By deleting this user, he or she will no longer have a FridgeWorthy account.
                                Please confirm you want to do this a database administrator.
                            </p>
                        </div>
                        <div class="modal-footer">
                            {!! Form::open(['action'=>['Admin\UserController@destroy',$user->id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Delete User',['class' => 'btn btn-danger']) !!}
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('errors.list')
@endsection
