<div class="form-group" id="numberOfCouponsDiv">
    {!! Form::label('name', 'Enter Course Name:') !!}
    {!! Form::text('name',null,['class' => 'form-control']) !!}
</div>
<div>
    {!! Form::select('teacher_id',$teachers->lists('fullname','id'),null,['class' =>'form-control']) !!}
</div>
<div class="form-group" id="description">
    {!! Form::label('description', 'Give a description of the course:') !!}
    {!! Form::textarea('description',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form-control']) !!}
</div>