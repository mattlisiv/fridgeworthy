@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')


    <h1>{{$reward->name}}</h1>

    @if(!is_null($reward->getFilePath()))
        <p><img src="{{$reward->getFilePath()}}" alt="No image found"></p>
        @else
        <p>No image provided</p>
        @endif


    <article>
        No statistics provided for {{$reward->name}}

        {!! Form::open(['action'=>['Admin\RewardController@edit',$reward->id], 'method' => 'GET']) !!}
        {!! Form::submit('Edit Reward',['class' => 'btn btn-primary form-control']) !!}
        {!! Form::close() !!}

        {!! Form::open(['action'=>['Admin\RewardController@destroy',$reward->id], 'method' => 'DELETE']) !!}
        {!! Form::submit('Delete Reward',['class' => 'btn btn-danger form-control']) !!}
        {!! Form::close() !!}

        <a href="{{action('Admin\RewardController@index') }}"> <h6>Back to Reward Management</h6></a>
    </article>

    @include('errors.list')
@endsection
