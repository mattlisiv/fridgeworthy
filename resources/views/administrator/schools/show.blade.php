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
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3>School Information</h3></div>
                        <div class="panel-body">
                            <p>Name: {{$school->name}}</p>
                            <p>Region: {{$school->region->name}}</p>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3>Course Breakdown</h3></div>
                        <div class="panel-body">
                            @if(count($courses))
                                <table class="table table-striped">
                                    <tr><th>Course Name</th><th>Teacher</th></tr>
                                    @foreach($courses as $course)
                                        <tr><td>{{$course->name}}</td><td><a href="{{action('Admin\UserController@show',$course->teacher->id)}}">{{$course->teacher->getName()}}</a></td></tr>
                                        @endforeach
                                </table>
                            @else
                                <p>No current courses at this time.</p>
                            @endif
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3>User Breakdown</h3></div>
                        <div>
                            <ul class="list-group stack-list">
                                <li class="list-group-item list-group-item-info"><span class="badge">{{count($students)+count($teachers)+count($parents)}}</span>Total Users</li>
                                <li class="list-group-item"><span class="badge">{{count($students)}}</span>Students</li>
                                <li class="list-group-item"><span class="badge">{{count($teachers)}}</span>Teachers</li>
                                <li class="list-group-item"><span class="badge">{{count($parents)}}</span>Parents</li>
                            </ul>
                        </div>
                    </div>

                </div>
                </div>
            </div>
        <div class="col-lg-3 col-lg-offset-1" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">Edit School</div>
                <div class="panel-body">
                    {!! Form::open(['action'=>['Admin\SchoolController@edit',$school->id], 'method' => 'GET']) !!}
                    {!! Form::submit('Edit School',['class' => 'btn btn-primary form-control']) !!}
                    {!! Form::close() !!}
                    <br>
                    <button type="button" class="btn btn-danger form-control" data-toggle="modal" data-target="#deleteModal"> Delete School</button>
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
                            <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this school? </h4>
                        </div>
                        <div class="modal-body">
                            <p>
                                By deleting this school, you will be deleting all associated classes and assignments.
                                Please confirm you want to do this a database administrator.
                            </p>
                        </div>
                        <div class="modal-footer">
                            {!! Form::open(['action'=>['Admin\SchoolController@destroy',$school->id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Delete School',['class' => 'btn btn-danger']) !!}
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @include('errors.list')

@endsection
