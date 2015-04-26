{!! Form::open(['url'=>'coupons','files'=>'true']) !!}
<div class="form-group" id="file" style="display:none">
    {!! Form::label('coursefile', 'Load File For Course') !!}
    {!! Form::file('coursefile') !!}
</div>

<div class="form-group" id="fileName">
    {!! Form::label('filename', 'Enter Name of File:') !!}
    {!! Form::text('filename',null,['class' => 'form-control']) !!}
</div>
    <input type="hidden" name="course_id" value="{{$course->id}}">
{!! Form::close() !!}
