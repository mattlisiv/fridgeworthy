@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')

    <h1>Reward Management</h1>

    @foreach($rewards as $reward)
        <article>

            <a href="{{action('RewardController@show',[$reward->id]) }}"> <h2>{{$reward->name}}</h2></a>
        </article>
    @endforeach

    <a href="{{action('RewardController@create') }}"> <h6>Create new Reward</h6></a>

@endsection