<div class="rewarddetcol">
    <p>This reward is brought to you by {{$reward->business->name}}.</p>
    <p>Visit their website at {!! Html::link('http://'.$reward->business->website, $reward->business->website) !!}</p>
    <img src="{{asset('images/alternate.jpg')}}" class="rewardlogo"/>
    @if(get_class($user) == 'App\Student' || get_class($user)=='App\Teacher' || get_class($user)=='App\Guardian')
        @if($user->points>=$reward->points_required)
            {!! Form::open(['url'=>'redeem_reward']) !!}
            <div>
                {!! Form::hidden('reward_id',$reward->id) !!}
            </div>
            {!! Form::submit('Redeem Reward',['class'=>'classdetbtn','style'=>'border-color:#13cf56;background-color:#13cf56']) !!}
            {!! Form::close()!!}
        @else
            <div class="redeemnowbtn"><h3>You need {{$reward->points_required - $user->points}} more points to redeem this reward.</h3></div>
        @endif
    @endif
</div>