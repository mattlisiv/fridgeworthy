<div class="rewarddetcol">
    <p>This reward is brought to you by {{$reward->business->name}}.</p>
    <p>Visit their website at {!! Html::link('http://'.$reward->business->website, $reward->business->website) !!}</p>
    <img alt="No image found" src="{{asset($reward->getFilePath())}}" class="rewardlogo"/>
@if(get_class($user) == 'App\Student' || get_class($user)=='App\Teacher' || get_class($user)=='App\Guardian')
        @if($user->points>=$reward->points_required)
            <div id="redeem" style="display:none">
            {!! Form::open(['url'=>'redeem_reward']) !!}
            <div>
                <h4>Are you sure you would like to redeem this reward for {{$reward->points_required}} points?</h4>
                {!! Form::hidden('reward_id',$reward->id) !!}
                <br>
            </div>
            {!! Form::submit('Yes',['class'=>'classdetbtn','style'=>'border-color:#13cf56;background-color:#13cf56']) !!}
            <br>

                {!! Form::close()!!}
                <button style="border-color: red;background-color: red" class="classdetbtn" onclick="hideRedemption()">No</button>
            </div>
            <div id="redemptionDisplay">
                <button class="classdetbtn" onclick="displayRedemption()">Redeem Reward</button>
            </div>
            <script type="text/javascript">

                function displayRedemption(){

                    $("#redemptionDisplay").hide();
                    $("#redeem").show();
                }

                function hideRedemption(){

                    $("#redeem").hide();
                    $("#redemptionDisplay").show();

                }

            </script>
        @else
            <div class="redeemnowbtn"><h3>You need {{$reward->points_required - $user->points}} more points to redeem this reward.</h3></div>
        @endif
    @endif
</div>