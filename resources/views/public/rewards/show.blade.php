<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>fridgeworthyrewards.com</title>
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

    <!--CSS links-->
    <link href="/css/reset.css" rel="stylesheet" type="text/css">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link href="/css/pages.css" rel="stylesheet" type="text/css">
    <link href="/css/responsive.css" rel="stylesheet" type="text/css">

    <!--JS links-->
    <script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/js/waypoints.min.js"></script>
    <script type="text/javascript" src="/js/waypoints.sticky.js"></script>
    <script type="text/javascript" src="/js/parallax.js"></script>
    <script type="text/javascript" src="/js/retina.min.js"></script>
    <script type="text/javascript" src="/js/jquery.stepframemodal.js"></script>
    <script type="text/javascript" src="/js/fridgeworthy.js"></script>

    <!--favicon-->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>

<body class="rcbg" ontouchstart="">

<div class="mainwrap">


    @include('home.partials.StickyNavigation')

    @include('home.partials.modal.Login')

    @include('home.partials.modal.Logout')

    <!--rewarddetail-->
    <section id="rewcentdetailpanelin">
        <div class="rewcentdetailpancnt">

            <div class="rewardboxlg">

                <div class="rewardinfo">
                    <div class="rewarddetcol">
                        <h1 class="orange">{{$reward->name}}</h1>
                        <h3>This reward costs <span class="pointshighlight">{{$reward->points_required}}</span> Fridge points</h3>
                        <p>{{$reward->description}}</p>
                    </div>
                    @if(is_null($user))
                    <div class="rewarddetcol">
                        <p>This reward is brought to you by {{$reward->business->name}}.</p>
                        <p>Visit their website at {!! Html::link('http://'.$reward->business->website, $reward->business->website) !!}</p>
                        <img src="/images/alternate.jpg" class="rewardlogo"/>
                        <p><a href="#loginmodal" class="plink modal-popup">Login</a> or <a href="{{url('/')."#home"}}" class="plink">Register</a> to see how you can get great rewards like this one!</p>
                    </div>
                    @else
                    <div class="rewarddetcol">
                        <p>This reward is brought to you by {{$reward->business->name}}.</p>
                        <p>Visit their website at {!! Html::link('http://'.$reward->business->website, $reward->business->website) !!}</p>
                        <img src="/images/alternate.jpg" class="rewardlogo"/>
                        <div class="redeemnowbtn"><a href="#">redeem reward<img src="/images/whiterightarrow.png" alt="white right arrow"></a></div>
                    </div>
                    @endif

                </div>

                <div class="rewarddet2ndrow">
                    <a href="{{action('PublicRewardController@index')}}" class="backrewbtn"><img src="/images/backarrowreg.png"><p>back to rewards</p></a>
                </div>

            </div><!--endrewardsboxlg-->

        </div><!--endrewardscentpancnt-->
        <div class="push"></div><!--push content footer-->
    </section><!--end rewcendetailpanel-->

    <div class="push"></div>
</div><!--end mainwrap-->
<!--footer-->
@include('home.partials.Footer')
<!--end footer-->

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