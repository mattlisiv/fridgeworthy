@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')
    <div class="row">
        <div class="col-lg-8">
            <h1>User Management</h1>
            <table class="table table-bordered">
                <tr><th>ID</th><th>Email</th><th>Role</th><th>Status</th></tr>
                @foreach($users as $user)
                    <tr>
                        <td><a href="{{action('Admin\UserController@show',[$user->id])}}">{{$user->getName()}}</a></td>
                        <td>{{$user->email}}</td>
                        @if(get_class($user)=='App\Student')
                            <td>Student</td>
                            @elseif(get_class($user)=='App\Teacher')
                            <td>Teacher</td>
                            @elseif(get_class($user)=='App\Guardian')
                            <td>Parent</td>
                            @elseif(get_class($user)=='App\BusinessManager')
                            <td>Business Manager</td>
                            @elseif(get_class($user)=='App\Admin')
                            <td>Site Admin</td>
                            @else
                            <td>{{get_class($user)}}</td>
                            @endif
                        <td>{{$user->status}}</td>
                    </tr>
                @endforeach
            </table> 
        </div>
        <div class="col-lg-3 col-lg-offset-1" style="padding-top: 50px;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="{{action('Admin\UserController@create') }}"> <h4>Create New User</h4></a>
                    <p>Current Number of Users: {{$users->count()}}</p>
                </div>
        </div>
    </div>
@endsection
