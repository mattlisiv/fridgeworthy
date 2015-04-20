@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')

    <h1>Region Management</h1>

    @foreach($regions as $region)
        <article>

            <a href="{{action('RegionController@show',[$region->id]) }}"> <h2>{{$region->name}}</h2></a>
        </article>
    @endforeach

    <a href="{{action('RegionController@create') }}"> <h6>Create new Region</h6></a>

@endsection