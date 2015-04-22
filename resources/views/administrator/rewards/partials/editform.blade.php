<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name',null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description',null,['class' => 'form-control']) !!}
</div>

<div>
    {!! Form::label('business', 'Select Business:') !!}
    {!! Form::select('business_id',$businesses->lists('name','id'),null,['class' =>'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('points_required', 'Points Required to Redeem Reward:') !!}
    {!! Form::text('points_required',null,['class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('image', 'Select Image for Reward') !!}
    {!! Form::file('image',null) !!}
</div>

<div class="form-group">
    {!! Form::label('dollar_amount', 'Dollar Worth of Reward:') !!}
    {!! Form::text('dollar_amount',null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('expiration', 'Reward Expiration:') !!}
    {!! Form::text('expiration','',array('id'=>'datepicker')) !!}
</div>

<br>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form-control']) !!}
</div>

<script type="text/javascript">
    var expiration = '{{$reward->expiration->format('m/d/Y')}}';



</script>
<script src="{{ URL::asset('js/jquery-1.11.1.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/admin/edit_reward.js') }}"></script>