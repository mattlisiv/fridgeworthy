<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name',null,['class' => 'form-control']) !!}
</div>

<div>
    {!! Form::select('region_id',$regions->lists('name','id'),null,['class' =>'form-control']) !!}
</div>
<br>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form-control']) !!}
</div>