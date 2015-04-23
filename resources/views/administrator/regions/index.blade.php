@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')
<div class="row">
    <div class="col-lg-8">
        <ol class="breadcrumb">
            <li><a href="{{action('Admin\AdministratorController@index') }}">Administrative Home</a></li>
            <li class="active">Region Management</li>
        </ol>
        <h1>Region Management</h1>
        <table class="table table-bordered">
            <tr><th>Name</th></tr>
            @foreach($regions as $region)
                <tr>
                   <td><a href="{{action('Admin\RegionController@show',[$region->id]) }}">{{$region->name}}</a></td>
                </tr>
            @endforeach
        </table>     
    </div>
    <div class="col-lg-3 col-lg-offset-1" style="padding-top: 50px;">
        <div class="panel panel-default">
            <div class="panel-body">
                <a href="{{action('Admin\RegionController@create') }}"> <h4>Create New Region</h4></a>
                <p>Current Number of Regions: {{$regions->count()}}</p>
            </div>
        </div>
    </div>
</div>
    
@endsection
