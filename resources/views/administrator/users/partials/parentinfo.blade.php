<h6>Parent</h6>
<br>
<div class="panel panel-default">
    <div class="panel-heading">Personal Information</div>
    <div class="panel-body">
        <p>Name: {{$user->fullname}}</p>
        <p>Email: {{$user->email}}</p>
        <p>Points: {{$user->points}}</p>
        <p>Status: {{$user->status}}</p>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Student's Information</div>
    <div class="panel-body">
        @if(count($students))
            <table class="table table-striped">
                <tr><th>Name</th><th>School</th><th>Grade</th></tr>
                @foreach($students as $student)
                    <tr><td><a href="{{action('Admin\UserController@show',$student->id)}}">{{$student->fullname}}</a></td><td>{{$student->school->name}}</td><td>{{$student->grade}}</td></tr>
                    @endforeach
            </table>
            @else
            <p> No related students at this time.</p>

        @endif
        <a><p>Click to add student to account.</p></a>
    </div>
</div>

@include('administrator.users.partials.rewardpanel')