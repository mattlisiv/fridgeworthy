@extends('static.staticmaster')
    @section('content')
    @include('administrator.partials.navbar')

    <div class="row">
        <div class="col-lg-8">
            <h1>Reward Management</h1>
            <table class="table table-bordered">
                <tr><th>Name</th></tr>
                @foreach($rewards as $reward)
                    <tr>
                        <td><a href="{{action('Admin\RewardController@show',[$reward->id]) }}">{{$reward->name}}</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="col-lg-3 col-lg-offset-1" style="padding-top: 50px;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="{{action('Admin\RewardController@create') }}"> <h4>Create New Reward</h4></a>
                    <p>Current Number of Rewards: {{$reward->count()}}</p>
                </div>
            </div>
        </div>
    </div>
