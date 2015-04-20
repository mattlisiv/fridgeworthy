@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')

    <h1>User Management</h1>



    <a href="{{action('UserController@create') }}"> <h6>Create New User</h6></a>

@endsection