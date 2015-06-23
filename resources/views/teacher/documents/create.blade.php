
<div class="form-group">
    {!! Form::open(['url'=>'uploadtest','files'=>'true']) !!}
    <br>
    {!! Form::label('file', 'Select file to upload') !!}
    <br>
    {!! Form::file('study_file') !!}
    <br>
    {!! Form::submit('Upload File') !!}
    <br>
    {!! Form::close() !!}
</div>