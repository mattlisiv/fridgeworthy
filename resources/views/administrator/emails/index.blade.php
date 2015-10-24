@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')
    <div class="row">
        <div class="col-lg-8">
            <ol class="breadcrumb">
                <li><a href="{{action('Admin\AdministratorController@index') }}">Administrative Home</a></li>
                <li class="active">Email Management</li>
            </ol>
            <h1>Email Management</h1>
            <table class="table table-bordered">
                <tr><th>Name</th><th>Email</th><th>Type</th></tr>
                @foreach($emails as $email)
                    <tr>
                        <td>{{$email->getName()}}</td>
                        <td>{{$email->email}}</td>
                        <td>{{$email->type}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="col-lg-3 col-lg-offset-1" style="padding-top: 50px;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Current Number of Individuals on Email List: {{$emails->count()}}</p>
                </div>
            </div>
        </div>
@endsection
