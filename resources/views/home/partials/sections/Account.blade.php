<!--my points-->
<section id="myacct">
    <div id="myacctpancnt">
        <h1 class="whitedkgray">you have <span class="pointshighlight">{{$user->points}}</span> Fridge points!</h1>
        @if(get_class($user)=='App\Student' || get_class($user)=='App\Teacher')
        <div id="pointscirccont">
            <div class="pointscirc"><a href="{{action('CourseManagerController@viewMyCourses')}}" id="myclasses"><h5 class="white">my<br>classes</h5></a></div>
            @if(get_class($user)=='App\Student')
            <div class="pointscirc"><a href="{{action('CourseManagerController@enrollInCourse')}}" id="enrollinclass"><h5 class="white">enroll<br>in class</h5></a></div>
            @endif
            @if(get_class($user)=='App\Teacher')
                <div class="pointscirc"><a href="{{action('CourseManagerController@createCourse')}}" id="enrollinclass"><h5 class="white">create<br>a class</h5></a></div>
            @endif
            <div class="pointscirc"><a href="{{action('AssignmentManagerController@viewMyAssignments')}}" id="viewassign"><h5 class="white">view<br>assignments</h5></a></div>
            <div class="pointscirc"><a href="#" id="myrewards"><h5 class="white">my<br>rewards</h5></a></div>
        </div>
        @endif
        @if(get_class($user)=='App\Guardian')
            <div id="pointscirccont">
                <div class="pointscirc"><a href="#" id="enrollinclass"><h5 class="white">learn about<br> parent's plus rewards</h5></a></div>
                <div class="pointscirc"><a href="myclasses.html" id="viewassign"><h5 class="white">view my<br>student's assignments</h5></a></div>
                <div class="pointscirc"><a href="myclasses.html" id="myclasses"><h5 class="white">view my<br>student's classes</h5></a></div>
                <div class="pointscirc"><a href="#" id="myrewards"><h5 class="white">my<br>rewards</h5></a></div>
            </div>
        @endif
    </div><!--end my points cnt-->
    <div class="orangerevsep"></div>


