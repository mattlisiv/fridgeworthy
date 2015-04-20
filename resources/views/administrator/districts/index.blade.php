@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')

    <h1>District Management</h1>

    @foreach($districts as $district)
        <article>

           <a href="{{action('Admin\DistrictController@show',[$district->id]) }}"> <h2>{{$district->name}}</h2></a>
        </article>
    @endforeach

    <a href="{{action('Admin\DistrictController@create') }}"> <h6>Create new District</h6></a>

@endsection