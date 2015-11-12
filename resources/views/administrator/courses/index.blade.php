@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')
    <div class="row">
        <div class="col-lg-8">
            <ol class="breadcrumb">
                <li><a href="{{action('Admin\AdministratorController@index') }}">Administrative Home</a></li>
                <li class="active">Course Management</li>
            </ol>
            <h1>Course Management</h1>
            <table id="search-table" class="table table-bordered">
                <tr><th>Course Name</th><th>School</th><th>Teacher</th></tr>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td><a href="{{action('Admin\CourseController@show',[$course->id])}}">{{$course->name}}</a></td>
                        <td><a href="{{action('Admin\SchoolController@show',[$course->school()->id])}}">{{$course->school()->name}}</a></td>
                        <td><a href="{{action('Admin\UserController@show',[$course->teacher->id])}}">{{$course->teacher->getName()}}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-3 col-lg-offset-1" style="padding-top: 50px;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="{{action('Admin\CourseController@create') }}"> <h4>Create New Courses</h4></a>
                    <p>Current Number of Courses: {{$courses->count()}}</p>
                </div>
            </div>
        </div>
@endsection