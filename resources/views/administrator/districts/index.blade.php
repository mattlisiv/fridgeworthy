@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')
<div class="row">
    <div class="col-lg-8">
        <ol class="breadcrumb">
            <li><a href="{{action('Admin\AdministratorController@index') }}">Administrative Home</a></li>
            <li class="active">District Management</li>
        </ol>
        <h1>District Management</h1>
        <table id="search-table" class="table table-bordered">
            <tr><th>Name</th></tr>
            <tbody>
            @foreach($districts as $district)
                <tr>
                    <td><a href="{{action('Admin\DistrictController@show',[$district->id]) }}">{{$district->name}}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-lg-3 col-lg-offset-1" style="padding-top: 50px;">
        <div class="panel panel-default">
            <div class="panel-body">
                <a href="{{action('Admin\DistrictController@create') }}"> <h4>Create New District</h4></a>
                <p>Current Number of Districts: {{$districts->count()}}</p>
            </div>

        </div>

    </div>
</div>




@endsection