@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')


    <h1>{{$region->name}}</h1>

    <article>
        No statistics provided for {{$region->name}}

        {!! Form::open(['action'=>['RegionController@edit',$region->id], 'method' => 'GET']) !!}
        {!! Form::submit('Edit Region',['class' => 'btn btn-primary form-control']) !!}
        {!! Form::close() !!}

        {!! Form::open(['action'=>['RegionController@destroy',$region->id], 'method' => 'DELETE']) !!}
        {!! Form::submit('Delete Region',['class' => 'btn btn-danger form-control']) !!}
        {!! Form::close() !!}

        <a href="{{action('RegionController@index') }}"> <h6>Back to Region Management</h6></a>
    </article>

    @include('errors.list')
@endsection
