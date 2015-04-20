@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')


    <h1>{{$business->name}}</h1>

    <article>
        No statistics provided for {{$business->name}}

        {!! Form::open(['action'=>['Admin\BusinessController@edit',$business->id], 'method' => 'GET']) !!}
        {!! Form::submit('Edit Business',['class' => 'btn btn-primary form-control']) !!}
        {!! Form::close() !!}

        {!! Form::open(['action'=>['Admin\BusinessController@destroy',$business->id], 'method' => 'DELETE']) !!}
        {!! Form::submit('Delete Business',['class' => 'btn btn-danger form-control']) !!}
        {!! Form::close() !!}

        <a href="{{action('Admin\BusinessController@index') }}"> <h6>Back to Business Management</h6></a>
    </article>

    @include('errors.list')
@endsection
