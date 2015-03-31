@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')


    <h1>{{$district->name}}</h1>

    <article>
        No statistics provided for {{$district->name}}

        {!! Form::open(['action'=>['DistrictController@edit',$district->id], 'method' => 'GET']) !!}
        {!! Form::submit('Edit District',['class' => 'btn btn-primary form-control']) !!}
        {!! Form::close() !!}

        {!! Form::open(['action'=>['DistrictController@destroy',$district->id], 'method' => 'DELETE']) !!}
        {!! Form::submit('Delete District',['class' => 'btn btn-danger form-control']) !!}
        {!! Form::close() !!}

        <a href="{{action('DistrictController@index') }}"> <h6>Back to District Management</h6></a>
    </article>

    @include('errors.list')
@endsection

