@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')
    <h3>User Details</h3>
    <div>
        <article>
            No statistics provided for {{$user->first_name}} {{$user->last_name}}

            {!! Form::open(['action'=>['Admin\UserController@edit',$user->id], 'method' => 'GET']) !!}
            {!! Form::submit('Edit User Information',['class' => 'btn btn-primary form-control']) !!}
            {!! Form::close() !!}

            {!! Form::open(['action'=>['Admin\UserController@destroy',$user->id], 'method' => 'DELETE']) !!}
            {!! Form::submit('Delete User',['class' => 'btn btn-danger form-control']) !!}
            {!! Form::close() !!}

            <a href="{{action('Admin\UserController@index') }}"> <h6>Back to User Management</h6></a>
        </article>
    </div>






    @include('errors.list')
@endsection
