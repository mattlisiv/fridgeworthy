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
            <div class="listtabletitle">You have not been confirmed as a student in this course.</div>

            <div style="height:300px">
                <div style="color: #ffffff;font-size:14px;font-family: 'ralewaylight', Helvetica, sans-serif;width:75%;margin: 0 auto">
                    <br>
                    <br>
                    <h5>We appreciate your participation, but you have not been confirmed by your teacher as a member of this class.</h5>
                    <br>
                    <br>
                    <h6>Please check back shortly! If you believe this is an error have your teacher contact FridgeWorthy at
                    <br> <span style="font-weight: bold">support@fridge-worthy.com.</span></h6>
                </div>
            </div>

</div><!--end list table-->
</section><!--end list template-->



<div class="push"></div>
</div><!--end mainwrap-->
<!--footer-->


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
