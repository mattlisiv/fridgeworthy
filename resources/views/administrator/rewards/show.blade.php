@extends('static.staticmaster')

@section('content')
    @include('administrator.partials.navbar')
        <div class="row">
            <div class="col-lg-8">
                <ol class="breadcrumb">
                    <li><a href="{{action('Admin\AdministratorController@index') }}">Administrative Home</a></li>
                    <li><a href="{{action('Admin\RewardController@index') }}">Reward Management</a></li>
                    <li class="active">{{$reward->name}}</li>
                </ol>
                 <h1>{{$reward->name}}</h1>
                 @if(!is_null($reward->getFilePath()))
                    <p><img src="{{$reward->getFilePath()}}" alt="No image found"></p>
                @else
                    <p>No image provided</p>
                @endif
                <br>
                <div class="row">
                    <div class="col-lg-12">

                            <div class="panel panel-default">
                                <div class="panel-heading"><h3>Reward Information</h3></div>
                                <div class="panel-body">
                                    <p>Name: {{$reward->name}}</p>
                                    <p>Description:{{$reward->description}}</p>
                                    <p>Points Required To Redeem Reward: {{$reward->points_required}}</p>
                                    <p>Dollar Worth: {{$reward->dollar_amount}}</p>
                                    <p>Expiration: {{\Carbon\Carbon::parse($reward->expiration)->diffForHumans()}}</p>
                                </div>
                            </div>

                            <br>
                            <br>
                    <div class="panel panel-default">
                            <div class="panel-heading"><h3>Coupon Breakdown</h3></div>
                                    <div class="panel-body">
                                        <ul class="list-group stack-list">
                                            <li class="list-group-item list-group-item-info"><span class="badge">{{count($coupons)}}</span>Total Coupons in circulation</li>
                                            <li class="list-group-item"><span class="badge">{{count($redeemedCoupons)}}</span>Coupons redeemed</li>
                                            <li class="list-group-item"><span class="badge">{{count($unredeemedCoupons)}}</span>Coupons unredeemed</li>
                                            <li class="list-group-item"><span class="badge">{{count($unclaimedCoupons)}}</span>Coupons unclaimed</li>
                                            <li class="list-group-item @if(count($flaggedCoupons))list-group-item-danger"@else"@endif><span class="badge">{{count($flaggedCoupons)}}</span>Coupons flagged</li>
                                        </ul>
                                    </div>
                    </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3>Reward Details</h3>
                                <p>These will be displayed on the coupons</p>
                            </div>
                            <div class="panel-body">
                                <ul class="list-group stack-list">
                                    @foreach($reward->details as $detail)
                                   <li class="list-group-item" style="width: 100%">

                                       <span class="badge btn-danger">Remove</span>
                                          {{$detail->description}}
                                   </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="panel-footer">
                                <div>
                                    <button class="btn btn-success">Add Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <p></p>
                <br>
            </div>
            <div class="col-lg-3 col-lg-offset-1" style="padding-top:50px">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Reward</div>
                    <div class="panel-body">
                        {!! Form::open(['action'=>['Admin\RewardController@edit',$reward->id], 'method' => 'GET']) !!}
                        {!! Form::submit('Edit Reward',['class' => 'btn btn-primary form-control']) !!}
                        {!! Form::close() !!}
                        <br>
                        {!! Form::open(['action'=>['Admin\RewardController@destroy',$reward->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete Reward',['class' => 'btn btn-danger form-control']) !!}
                        {!! Form::close() !!}    
                    </div>
                </div>
            </div>
        </div>
    @include('errors.list')
@endsection
