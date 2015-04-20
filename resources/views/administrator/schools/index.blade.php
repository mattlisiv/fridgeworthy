@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')

    <h1>School Management</h1>

    @foreach($schools as $school)
        <article>

            <a href="{{action('Admin\SchoolController@show',[$school->id]) }}"> <h2>{{$school->name}}</h2></a>
        </article>
    @endforeach

    <a href="{{action('Admin\SchoolController@create') }}"> <h6>Create new School</h6></a>

@endsection