@extends('static.staticmaster')
    @section('content')
    @include('administrator.partials.navbar')

    <div class="row">
        <div class="col-lg-8">
            <ol class="breadcrumb">
                <li><a href="{{action('Admin\AdministratorController@index') }}">Administrative Home</a></li>
                <li class="active">Reward Management</li>
            </ol>
            <h1>Reward Management</h1>
            <table id="search-table" class="table table-bordered">
                <tr><th>Name</th><th>Business</th></tr>
                <tbody>
                @if(isset($rewards))
                @foreach($rewards as $reward)
                    <tr>
                        <td><a href="{{action('Admin\RewardController@show',[$reward->id]) }}">{{$reward->name}}</a></td>
                        <td><a href="{{action('Admin\BusinessController@show',[$reward->business->id]) }}">{{$reward->business->name}}</a></td>
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="col-lg-3 col-lg-offset-1" style="padding-top: 50px;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="{{action('Admin\RewardController@create') }}"> <h4>Create New Reward</h4></a>

                    <p>Current Number of Rewards:
                        @if(isset($reward))
                        {{$reward->count()}}
                        @else
                        0
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endsection
