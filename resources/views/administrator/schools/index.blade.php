@extends('static.staticmaster')

@section('content')
    @include('administrator.partials.navbar')
<div class="row">
    <div class="col-lg-8">
        <ol class="breadcrumb">
            <li><a href="{{action('Admin\AdministratorController@index') }}">Administrative Home</a></li>
            <li class="active">School Management</li>
        </ol>
        <h1>School Management</h1>
        <table id="search-table" class="table table-bordered">
            <tr><th>Name</th></tr>
            <tbody>
            @foreach($schools as $school)
                <tr>
                    <td><a href="{{action('Admin\SchoolController@show',[$school->id])}}">{{$school->name}}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-lg-3 col-lg-offset-1" style="padding-top:50px;">
        <div class="panel panel-default">
            <div class="panel-body">
                <a href="{{action('Admin\SchoolController@create') }}"> <h4>Create New School</h4></a>
                <p>Current Number of Schools: {{$schools->count()}}</p>
            </div>
        </div>
    </div>
</div>
@endsection
