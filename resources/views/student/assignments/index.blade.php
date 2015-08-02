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
</head>

<body class="innerbg" ontouchstart="">

<div class="mainwrap">



    @include('navigation.masternav')


    @include('home.partials.modal.Logout')

    <!--start list template-->
    <section id="listtemplatecnt">
        <div class="listtable">
            <div class="listtabletitle">View Upcoming Assignments</div>
            @if(count($assignments))
                @foreach($assignments as $assignment)
                    <div class="listtablerow">
                        <div class="listitemname"><p class="white">{{$assignment->name}}</p></div>
                        <div class="listviewbutton">
                            <form action="#" method="post"> <a href="{{action('AssignmentManagerController@viewAssignment',$assignment->id)}}"><button type="button" value="view" class="smbtn">View </button></a></form>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="listtablerow">
                    <div class="listitemname"><p class="white">No current assignments.</p></div>
                </div>
            @endif

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
