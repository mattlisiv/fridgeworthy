<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>fridge-worthy.com</title>
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

    @include('js.maincssandjs')

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

</head>

<body class="innerbg" ontouchstart="">

<div class="mainwrap">

    @include('navigation.masternav')

    @include('home.partials.modal.Logout')


    <!--start list template-->
    <section id="listtemplatecnt">
        <div class="listtable">
            <div class="listtabletitle">{{$assignment->name}}</div>

            <div>
                <div style="color: #ffffff;font-size:14px;font-family: 'ralewaylight', Helvetica, sans-serif;width:75%;margin: 0 auto">
                    <br>
                    <br>
                    <h6>This assignment is for {{$assignment->course->name}}.</h6>
                    <br>
                    <br>
                    <h6><span style="font-weight:bold ">Additional Notes:</span> {{$assignment->description}}</h6>
                    <br>
                    <br>
                    <h6><span style="font-weight:bold "> Due Date:</span> {{$assignment->due_date->toFormattedDateString()}}</h6>
                    <br>
                    <br>
                    <br>

                    @if(is_null($grade) && $assignment->due_date > \Carbon\Carbon::now())
                        <a href="{{action('AssignmentManagerController@submitGrade',$assignment->id)}}"><button type="button" value="view grades" class="classdetbtn">submit grade</button></a>
                    @else
                        @if(!is_null($grade))
                        <h5>You have submitted a grade of <span style="font-weight: bold;color:white">{{$grade->numeric_grade}}</span> at {{$grade->created_at}} for this assignment.
                            The grade is currently <span style="font-weight: bold;color:white;">{{$grade->status}}</span>.
                        </h5>
                        @else
                            <h5> This assignment was due on {{$assignment->due_date->toFormattedDateString()}}. You are not able to submit a grade, because the due date has passed.</h5>
                        @endif
                    @endif
                    <br>
                    <br>
                    <a href="{{action('CourseManagerController@viewCourse',$assignment->course_id)}}"><button type="button" value="submit assignment" class="classdetbtn"> Back to Course</button></a>
                    <br>
                </div>
            </div>


        </div><!--end list table-->
    </section><!--end list template-->



<div class="push"></div>
</div><!--end mainwrap-->



@include('home.partials.Footer')

<!--responsive menu-->
<script type="text/javascript">
    jQuery(function($){
        $( '.menu-btn' ).click(function(){
            $('.responsive-menu').toggleClass('expand')
        })
    })
</script>

<script>
    jQuery(document).ready(function($){
        $(".menu-item-has-children").append("<div class='open-menu-link open'>+</div>");
        $('.menu-item-has-children').append("<div class='open-menu-link close'>—</div>");
        $('.open').addClass('visible');
        $('.open-menu-link').click(function(e){
            var childMenu =  e.currentTarget.parentNode.children[1];
            if($(childMenu).hasClass('visible')){
                $(childMenu).removeClass("visible");
                $(e.currentTarget.parentNode.children[3]).removeClass("visible");
                $(e.currentTarget.parentNode.children[2]).addClass("visible");
            } else {
                $(childMenu).addClass("visible");
                $(e.currentTarget.parentNode.children[2]).removeClass("visible");
                $(e.currentTarget.parentNode.children[3]).addClass("visible");
            }
        });
    });
</script>
</body>
</html>
