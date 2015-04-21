@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')

    <h1>Region Management</h1>
    <table>
    @foreach($regions as $region)

        <article>

            <a href="{{action('Admin\RegionController@show',[$region->id]) }}"> <h2>{{$region->name}}</h2></a>
        </article>
    @endforeach
        </table>
    <a href="{{action('Admin\RegionController@create') }}"> <h6>Create new Region</h6></a>

@endsection