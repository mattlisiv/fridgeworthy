<div class="form-group">
    {!! Form::label('first_name', 'First Name') !!}
    {!! Form::text('first_name',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('last_name', 'Last Name') !!}
    {!! Form::text('last_name',null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('role', 'Select Role:') !!}
    {!! Form::select('role',$roles->lists('name','id'),null,['class' =>'form-control','id'=>'role_select']) !!}
</div>

<div class="form-group" id="business_select_div">
    {!! Form::label('business', 'Select Business:') !!}
    {!! Form::select('business_id',$businesses->lists('name','id'),null,['class' =>'form-control']) !!}
</div>
<div class="form-group" id="school_select_div">
    {!! Form::label('schools', 'Select School:') !!}
    {!! Form::select('school_id',$schools->lists('name','id'),null,['class' =>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email',null,['class' => 'form-control']) !!}
</div>
<div class="form-group" id="parent_email_div">
    {!! Form::label('parent_email', 'Parent Email') !!}
    {!! Form::text('parent_email',null,['class' => 'form-control']) !!}
</div>
<div class="form-group" id="status_div">
    {!! Form::label('status', 'Select Status:') !!}
    {!! Form::select('status',array('active'=>'Active','pending'=>'Pending','suspended'=>'Suspended','deactivated'=>'Deactivated'),null,['class' =>'form-control','id'=>'status']) !!}
</div>
<input type="hidden" name="id" value="{{$user->id}}">
<div class="form-group" id="grade_div">
    {!! Form::label('Grade', 'Select Grade:') !!}
    <select class="form-control" name="grade" id="grade">
        <option value="0">Kindergarten</option>
        <option value="1">1st</option>
        <option value="2">2nd</option>
        <option value="3">3rd</option>
        <option value="4">4th</option>
        <option value="5">5th</option>
        <option value="6">6th</option>
        <option value="7">7th</option>
        <option value="8">8th</option>
        <option value="9">9th</option>
        <option value="10">10th</option>
        <option value="11">11th</option>
        <option value="12">12th</option>
    </select>
</div>
<div class="form-group" id="points_div">
    {!! Form::label('points', 'Points') !!}
    {!! Form::text('points',null,['class' => 'form-control']) !!}
</div>
<div class="radio form-group" id="password_type_div">
    <p>Reset Password</p>
    <label>
        <input type="radio" name="password_reset" value="reset_yes">
        Yes
    </label>
    <br>
    <label>
        <input type="radio" name="password_reset" value="reset_no" checked>
        No
    </label>
</div>
<br>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form-control']) !!}
</div>