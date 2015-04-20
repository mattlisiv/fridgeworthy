<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name',null,['class' => 'form-control']) !!}
</div>

<div>
    {!! Form::select('district_id',$districts->lists('name','id'),null,['class' =>'form-control']) !!}
</div>
    <br>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form-control']) !!}
</div>