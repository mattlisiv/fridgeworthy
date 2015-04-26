<h6>Teacher</h6>
<br>
<div class="panel panel-default">
    <div class="panel-heading">Personal Information</div>
    <div class="panel-body">
        <p>Name: {{$user->fullname}}</p>
        <p>Email: {{$user->email}}</p>
        <p>School: <a href="{{action('Admin\SchoolController@show',$user->school->id)}}">{{$user->school->name}}</a></p>
        <p>Points: {{$user->points}}</p>
        <p>Status: {{$user->status}}</p>
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

@include('administrator.users.partials.rewardpanel')
