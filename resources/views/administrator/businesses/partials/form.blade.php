<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('website', 'Website Address:') !!}
    {!! Form::text('website',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('location', 'Location:') !!}
    {!! Form::text('location',null,['class' => 'form-control']) !!}
</div>
<br>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form-control']) !!}
</div>