<div class="radio">
    <p>Select the type of coupons to be created</p>
    <label>
        <input type="radio" name="couponType" value="managed" checked>
        FridgeWorthy Managed Coupons: This option is for businesses without existing coupon systems.
    </label>
    <br>
    <label>
        <input type="radio" name="couponType" value="auto-managed">
        Auto-Managed Coupons:This option is for businesses incorporating existing coupon systems.
    </label>

</div>
<div class="form-group">
    {!! Form::label('numberOfCoupons', 'Enter Number of Coupons to be Generated:') !!}
    {!! Form::text('couponNumber',null,['class' => 'form-control']) !!}
</div>
<div>
    {!! Form::label('Reward', 'Select Reward:') !!}
    {!! Form::select('reward_id',$rewards->lists('name','id'),null,['class' =>'form-control']) !!}
</div>
<br>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form-control']) !!}
</div>