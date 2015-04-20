@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')

    <h1>Business Management</h1>

    @foreach($businesses as $business)
        <article>

            <a href="{{action('BusinessController@show',[$business->id]) }}"> <h2>{{$business->name}}</h2></a>
        </article>
    @endforeach

    <a href="{{action('BusinessController@create') }}"> <h6>Create New Business</h6></a>

@endsection