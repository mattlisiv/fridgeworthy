@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')

    <div class="row">
        <div class="col-lg-8">
            <ol class="breadcrumb">
                <li><a href="{{action('Admin\AdministratorController@index') }}">Administrative Home</a></li>
                <li><a href="{{action('Admin\CourseController@index') }}">Course Management</a></li>
                <li class="active">{{$course->name}}</li>
            </ol>
            <h1>{{$course->name}}</h1>
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Course Information</h3></div>
                <div class="panel-body">
                    <p>Description: {{$course->description}}</p>
                    <p>Teacher: <a href="{{action('Admin\UserController@show',$course->teacher->id)}}">{{$course->teacher->getName()}}</a></p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Assignments</h3></div>
                <div class="panel-body">
                    @if(count($course->assignments))
                    <table class="table table-striped">
                        <tr><th>Name</th><th>Due Date</th><th>Grades Submitted</th></tr>
                        @foreach($course->assignments as $assignment)
                            <tr><td>{{$assignment->name}}</td><td>{{\Carbon\Carbon::parse($assignment->due_date)->diffForHumans()}}</td><td>{{count($assignment->grades)}}/{{count($course->students)}}</td></tr>
                        @endforeach
                    @endif
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Students</h3></div>
                <div class="panel-body">
                    @if(count($course->students))
                        <table class="table table-striped">
                            <tr><th>Name</th></tr>
                            @foreach($course->students as $student)
                                <tr><td>{{$student->getName()}}</td><td>{{$student->statusInCourse($course)}}</td></tr>
                            @endforeach
                            @endif
                        </table>
                </div>
            </div>

        </div>
        <div class="col-lg-3 col-lg-offset-1" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Course</div>
                <div class="panel-body">
                    {!! Form::open(['action'=>['Admin\CourseController@edit',$course->id], 'method' => 'GET']) !!}
                    {!! Form::submit('Edit Course',['class' => 'btn btn-primary form-control']) !!}
                    {!! Form::close() !!}
                    <br>
                    {!! Form::open(['action'=>['Admin\CourseController@destroy',$course->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Delete Course',['class' => 'btn btn-danger form-control']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @include('errors.list')
@endsection


