@extends('static.staticmaster')

    @section('content')

    @include('administrator.partials.navbar')
    <div class="row">
        <div class="col-lg-8">
            <ol class="breadcrumb">
                <li><a href="{{action('Admin\AdministratorController@index') }}">Administrative Home</a></li>
                <li class="active">Business Management</li>
            </ol>
            <h1>Business Management</h1>
            <table id="search-table" class="table table-bordered">
                <tbody>
                <tr><th>Name</th></tr>
                    @foreach($businesses as $business)
                    <tr>
                        <td><a href="{{action('Admin\BusinessController@show',[$business->id]) }}">{{$business->name}}</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
        <div class="col-lg-3 col-lg-offset-1" style="padding-top: 50px;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="{{action('Admin\BusinessController@create') }}"> <h4>Create New Business</h4></a>
                    <p>Current Number of Businesses: {{$businesses->count()}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
