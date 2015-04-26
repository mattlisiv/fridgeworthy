<h6>Student</h6>
<br>
<div class="panel panel-default">
    <div class="panel-heading">Personal Information</div>
    <div class="panel-body">
        <p>Name: {{$user->fullname}}</p>
        <p>Email: {{$user->email}}</p>
        <p>School: <a href="{{action('Admin\SchoolController@show',$user->school->id)}}">{{$user->school->name}}</a></p>
        <p>Grade: {{$user->grade}}</p>
        <p>Points: {{$user->points}}</p>
        <p>Status: {{$user->status}}</p>
        @if($user->parent->first())
            <p>Parent Account: <a href="{{action('Admin\UserController@show',$user->parent->first()->id)}}">{{$user->parent->first()->fullname}}</a></p>
            @else
            <p>Parent Account: No parent has been attached to this account.</p>
            @endif

    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">Courses</div>
    <div class="panel-body">
        <table class="table table-striped">
            <tr><th>Course Name</th><th>Number Of Assignments</th></tr>
            @foreach($courses as $course)
                <tr>
                    <td><a href="{{action('Admin\CourseController@show',$course->id)}}">{{$course->name}}</a></td><td>{{count($course->assignments)}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">Grades</div>
    <div class="panel-body">
        <table class="table table-striped">
            <tr><th>Assignment</th><th>Grade</th><th>Status</th></tr>
            @foreach($grades as $grade)
                <tr>
                    <td>{{$grade->assignment->name}}</td><td>{{$grade->numeric_grade}}</td><td>{{$grade->status}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@include('administrator.users.partials.rewardpanel')

