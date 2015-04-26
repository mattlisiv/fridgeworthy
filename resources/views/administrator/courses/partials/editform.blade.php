<div class="form-group" id="numberOfCouponsDiv">
    {!! Form::label('name', 'Enter Course Name:') !!}
    {!! Form::text('name',null,['class' => 'form-control']) !!}
</div>
<div>
    <p>This course is taught by
        <span><a href="{{action('Admin\UserController@show',$course->teacher->id)}}">{{$course->teacher->fullname}}</a></span>
        at
        <span><a href="{{action('Admin\SchoolController@show',$course->school()->id)}}">{{$course->school()->name}}</a></span>
        .
    </p>
</div>
<div class="form-group" id="description">
    {!! Form::label('description', 'Give a description of the course:') !!}
    {!! Form::textarea('description',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form-control']) !!}
</div>