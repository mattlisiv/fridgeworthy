<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>FridgeWorthy | Rewards</title>
    <meta name="description" content="Check out our Reward Center!">
    <meta name="keywords" content="reward">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

   @include('js.maincssandjs')
</head>

<body class="rcbg" ontouchstart="">

<div class="mainwrap">

   @include('navigation.masternav')

    <!--rewardcenter-->
    <section id="rewardscenterpanel">

        <div id="rewcentpancnt">
            <h1 class="orange">find great rewards!</h1>
            <!--
            <form action="#" method="post">
                <input type="text" placeholder="search rewards" class="magicon"/>
                <button type="button" value="submit" class="smbtn searchbtn">submit</button>
            </form>
            -->
            <div id="rewardsboxwrap">
                @if(sizeof($rewards)!=0)
                @foreach($rewards as $reward)
                    <div class="rewardbox">
                        <h6>{{$reward->name}}</h6>
                        <img src="{{$reward->getFilePath()}}" alt="No iamge provided"/>
                        <p><span class="pointshighlight">{{$reward->points_required}}</span> Fridge points</p>
                        <div class="detbtncont"><a href="{{action('PublicRewardController@show',[$reward->id]) }}" class="getdetailsbtn"><p>get details</p><img src="{{asset('images/detarrow.png')}}"></a></div>
                        <div class="clear"></div>
                    </div>
                    @endforeach
                @else
                    <h3>Check back for rewards soon!</h3>
                @endif
            </div><!--endrewardsboxwrap-->

        </div><!--endrewardscentpancnt-->
    </section>

    <div class="push"></div>
</div><!--end mainwrap-->
<!--footer-->
@include('home.partials.Footer')

<!--end footer-->

<!--modals-->
@include('home.partials.modal.Login')
@include('home.partials.modal.Logout')

<!--end modals-->

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
