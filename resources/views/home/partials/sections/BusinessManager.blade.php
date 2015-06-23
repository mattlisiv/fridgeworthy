
<!--start business portal-->
<section id="busport">
<div id="busportcnt">
    {!! Form::open(['url'=>'submit_access_code','id'=>'codeform']) !!}
    <br>
    {!! Form::label('Select Reward') !!}
    <h6>{!! Form::select('reward_id',array('default'=>'Select Reward') +$business->rewards->lists('name','id'),
        'default',['class'=>'customSelect']) !!}</h6>
    <br>
    <br>
    {!! Form::label('Enter access code') !!}
    <h6>{!! Form::text('access_code',null,['placeholder'=>'enter access code','class'=>'tfield']) !!}</h6>
{!! Form::button('Submit',['type'=>'submit']) !!}
{!! Form::close()!!}
    @if($errors)
        <div style="color:red;margin: 0 auto;text-align: center">
            <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <br>
    </div>
    @endif
<div id="redempstats">
    <h1>rewards statistics<br> for<br> {{$business->name}}</h1>
    <div class="redempbox" id="redbox"><h2>{{count($business->rewards)}}</h2><p>rewards</p></div>
    <div class="redempbox" id="queuebox"><h2>{{count($business->coupons)}}</h2><p>coupons</p></div>
    <div class="redempbox" id="circbox"><h2>{{count($business->coupons()->redeemed()->get())}}</h2><p>coupons redeemed</p></div>
    <div class="redempbox" id="cancbox"><h2>{{count($customers)}}</h2><p>customers</p></div>
</div>
</section>
<!--end business portal-->
