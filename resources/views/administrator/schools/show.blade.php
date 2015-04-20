@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')


    <h1>{{$school->name}}</h1>

    <article>
        No statistics provided for {{$school->name}}

        {!! Form::open(['action'=>['Admin\SchoolController@edit',$school->id], 'method' => 'GET']) !!}
        {!! Form::submit('Edit School',['class' => 'btn btn-primary form-control']) !!}
        {!! Form::close() !!}

        {!! Form::open(['action'=>['Admin\SchoolController@destroy',$school->id], 'method' => 'DELETE']) !!}
        {!! Form::submit('Delete School',['class' => 'btn btn-danger form-control']) !!}
        {!! Form::close() !!}

        <a href="{{action('Admin\SchoolController@index') }}"> <h6>Back to School Management</h6></a>
    </article>

    @include('errors.list')
@endsection
