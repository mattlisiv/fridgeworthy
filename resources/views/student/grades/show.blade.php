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
            <div class="listtabletitle">Grade Details</div>

            <div style="height:350px">
                <div style="color: #ffffff;font-size:14px;font-family: 'ralewaylight', Helvetica, sans-serif;width:75%;margin: 0 auto">
                    <br>
                    <br>
                    <h6>This grade is for <span style="color:white;font-weight: bold">{{$grade->assignment->name}}</span> of the class {{$grade->assignment->course->name}}.</h6>
                    <br>
                    <br>
                    <h6>This current status of the grade is <span style="color:white;font-weight: bold">{{$grade->status}}</span>. The grade was uploaded on {{$grade->created_at->format('d-m-Y')}}
                        and last updated at on {{$grade->updated_at->format('d-m-Y')}}.
                    </h6>
                    <br>
                    <br>
                    <h6>
                        The current numeric points entered for the grade is <span style="color:white;font-weight: bold">{{$grade->numeric_grade}}</span>.
                    </h6>
                    <br>
                    <br>
                    <a href="{{action('CourseManagerController@viewCourse',$grade->assignment->course_id)}}"><button type="button" value="submit assignment" class="classdetbtn">Back to Class</button></a>
                </div>
                <br>

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
