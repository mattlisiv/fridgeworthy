@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')

    <div class="row">
        <div class="col-lg-8">
            <ol class="breadcrumb">
                <li><a href="{{action('Admin\AdministratorController@index') }}">Administrative Home</a></li>
                <li><a href="{{action('Admin\CourseController@index') }}">Course Management</a></li>
                <li class="active">{{$course->name}}</li>
            </ol>
            <h1>{{$course->name}}</h1>
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Course Information</h3></div>
                <div class="panel-body">
                    <p>Description: {{$course->description}}</p>
                    <p>Teacher: <a href="{{action('Admin\UserController@show',$course->teacher->id)}}">{{$course->teacher->getName()}}</a></p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Assignments</h3></div>
                <div class="panel-body">
                    @if(count($course->assignments))
                    <table class="table table-striped">
                        <tr><th>Name</th><th>Due Date</th><th>Grades Submitted</th></tr>
                        @foreach($course->assignments as $assignment)
                            <tr><td>{{$assignment->name}}</td><td>{{\Carbon\Carbon::parse($assignment->due_date)->diffForHumans()}}</td><td>{{count($assignment->grades)}}/{{count($course->students)}}</td></tr>
                        @endforeach
                    </table>
                        @else
                        <p>No current assignments at this time</p>
                        @endif
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Students</h3></div>
                <div class="panel-body">
                    @if(count($course->students))
                        <table class="table table-striped">
                            <tr><th>Name</th><th>Status</th></tr>
                            @foreach($course->students as $student)
                                <tr><td>{{$student->getName()}}</td><td>{{$student->statusInCourse($course)}}</td></tr>
                            @endforeach

                        </table>
                        @else
                        <p>No current students at this time.</p>
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Uploaded Files</h3></div>
                <div class="panel-body">
                    @if(count($course->uploadedFiles))
                        <table>
                            <tr><th>File Name</th></tr>
                            @foreach($course->uploadedFiles as $file)
                                <tr><td>{{$file->filename}}</td><td> <a href="/{{public_path()}}/{{$file->file_path}}" target="_blank" download>Download</a></td></tr>
                                @endforeach
                        </table>
                    @else

                        <p>No current files at this time.</p>
                    @endif
                        <br>
                        <button class="btn btn-default" onclick="openFileUploadModal()">Add File</button>
                </div>

            </div>

        </div>
        <div class="col-lg-3 col-lg-offset-1" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Course</div>
                <div class="panel-body">
                    {!! Form::open(['action'=>['Admin\CourseController@edit',$course->id], 'method' => 'GET']) !!}
                    {!! Form::submit('Edit Course',['class' => 'btn btn-primary form-control']) !!}
                    {!! Form::close() !!}
                    <br>
                    <button type="button" class="btn btn-danger form-control" data-toggle="modal" data-target="#deleteModal"> Delete Course</button>
                </div>
            </div>
        </div>
    </div>
    @include('errors.list')
    @include('js.vex')
    <script type="text/javascript">


        function openFileUploadModal(){

            vex.dialog.open({
                message: 'Add a file to course',
                input: '<div id=\"upload-file\"></div>',
                buttons: [
                    $.extend({}, vex.dialog.buttons.YES, {
                        text: 'Upload File'
                    }), $.extend({}, vex.dialog.buttons.NO, {
                        text: 'Back'
                    }),

                ],
                callback: function(data) {
                    if (data === false) {
                        $( "#upload-file" ).appendTo( "#file-upload-modal" );
                        return console.log('Cancelled');
                    }
                    document.getElementById("uploadFileForm").submit(); }
            });
                $( "#file-upload-modal" ).appendTo( "#upload-file" );

        }


    </script>
@endsection

<div style="display: none">
    <div id="file-upload-modal">
        {!! Form::open(['url'=>'fileuploads','files'=>'true','id'=>'uploadFileForm']) !!}
        <div class="form-group" id="coursefile">
            {!! Form::label('coursefile', 'Load File For Course') !!}
            {!! Form::file('coursefile') !!}
        </div>

        <div class="form-group" id="numberOfCouponsDiv">
            {!! Form::label('filename', 'Enter Name of File:') !!}
            {!! Form::text('filename',null,['class' => 'form-control']) !!}
        </div>
        <input type="hidden" name="course_id" value="{{$course->id}}">
        {!! Form::close() !!}
    </div>

</div>

<div class="modal" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="delete">
        <div class="modal-content">
            <div class="modal-content">
                <div>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this course? </h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            By deleting this course, you will be deleting all associated assignments and grades.
                            Please confirm you want to do this a database administrator.
                        </p>
                    </div>
                    <div class="modal-footer">
                        {!! Form::open(['action'=>['Admin\CourseController@destroy',$course->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete Course',['class' => 'btn btn-danger']) !!}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
