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

            @if(get_class($user)=='App\Teacher')
                <br>
                <a href="{{action('DocumentManagerController@create',$course->id)}}"><h2 class="plinkwhite">Click here to upload study material!</h2></a>
                <br>
            @endif

            <div class="listtabletitle">Study Files</div>
            @if(count($files))
                @foreach($files as $file)
                    <div class="listtablerow">
                        <div style="width: 33%" class="listitemname"><p class="white">{{$file->filename}}</p></div>
                        @if(get_class($user)=='App\Teacher')
                        <div class="listviewbutton">
                          <a href="{{action('DocumentManagerController@delete',$file->id)}}"><button type="button" value="view" class="smbtn">Delete </button></a>
                        </div>
                        @endif
                        <div class="listviewbutton">
                         <a href="{{action('DocumentManagerController@show',$file->id)}}"><button type="button" value="view" class="smbtn">View </button></a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="listtablerow">
                    <div class="listitemname"><p class="white">No current study files.</p></div>
                </div>
            @endif

        </div><!--end list table-->
        <br>
        <br>
        <a href="{{action('CourseManagerController@viewCourse',$course->id)}}"><button class="managebtn">View Course</button></a>
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
