<!DOCTYPE HTML>
<html><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>fridge-worthy.com</title>
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

    @include('js.maincssandjs')

    <!--JS links-->
    <script type="text/javascript" src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/waypoints.sticky.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/parallax.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/retina.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.stepframemodal.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/fridgeworthy.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/modernizr.js')}}"></script>
    <script type="text/javascript">
        if (!Modernizr.svg) {
            var imgs = document.getElementsByTagName('img');
            var svgExtension = /.*\.svg$/
            var l = imgs.length;
            for(var i = 0; i < l; i++) {
                if(imgs[i].src.match(svgExtension)) {
                    imgs[i].src = imgs[i].src.slice(0, -3) + 'png';
                    console.log(imgs[i].src);
                }
            }
        }
    </script>


    @include('home.partials.favico')
</head>

<body class="infographicbg" ontouchstart="">

@include('socialmedia.google-tag-manager')

<div class="mainwrap">


    @include('navigation.masternav')

    @include('home.partials.modal.Logout')

    @include('home.partials.modal.Login')

    <!--start infographic-->
    <section id="infographicpancnt">
        <h1 class="whitedkgray">how hard work <span>pays off</span></h1>
        <div id="stars"><img src="{{asset('images/infographic-stars.svg')}}" alt="stars"></div>

        <div id="infographicwrap">

            <div id="igstudrow" class="igrow">
                <div class="igsubtitle"><h1>students</h1></div>
                <div class="igcnt">

                    <div id="igstudcellrow1" class="igrow">
                        <div class="igcell"><h5>Students register for FridgeWorthy through our online portal</h5></div>
                        <div class="igarrow"></div>
                        <div class="igcell"><h5>Students take their usual tests and quizzes at school</h5></div>
                        <div class="igarrow"></div>
                        <div class="igcell"><h5>Students post their grades on their online FridgeWorthy profile</h5></div>
                        <div class="igarrow"></div>
                        <div class="igcell" id="yellowdownleft"><h5>Students receive FridgePoints for good grades after teacher verification</h5></div>
                    </div>

                    <div id="igstudcellrow2" class="igrow">
                        <div class="igcell" id="studcell1"><h5>Students use their FridgePoints to redeem rewards from participating local businesses</h5></div>
                        <div class="igarrow"></div>
                        <div class="igcell" id="studcell2"><h5>Students can access study materials, provided by teachers, to help them prepare for upcoming assessments</h5></div>
                    </div>

                </div>
            </div>

            <div id="igteachrow" class="igrow">
                <div class="igsubtitle"><h1>teachers</h1></div>
                <div class="igcnt">
                    <div class="igcell"><h5>Teachers register for FridgeWorthy through our online portal</h5></div>
                    <div class="igarrow"></div>
                    <div class="igcell"><h5>Teachers post test submission forms at <a href="http://www.fridge-worthy.com" target="_self" class="iglink">www.fridge-worthy.com</a></h5></div>
                    <div class="igarrow"></div>
                    <div class="igcell"><h5>Teachers verify the grades of their students and grant students FridgePoints</h5></div>
                    <div class="igarrow"></div>
                    <div class="igcell"><h5>Teachers receive FridgePoints for providing online study materials and participating in the success of their students</h5></div>
                    <div class="igarrow"></div>
                    <div class="igcell"><h5>Teachers use their FridgePoints to redeem rewards from participating local businesses</h5></div>
                </div>
            </div>

            <div id="igparentrow" class="igrow">
                <div class="igsubtitle"><h1>parents</h1></div>
                <div class="igcnt">
                    <div class="igcell"><h5>Parents register with their child to gain access to FridgeWorthy</h5></div>
                    <div class="igarrow"></div>
                    <div class="igcell"><h5>Parents earn FridgePoints as their child succeeds academically</h5></div>
                    <div class="igarrow"></div>
                    <div class="igcell"><h5>Parents use their FridgePoints to redeem rewards from participating local businesses</h5></div>
                    <div class="igarrow"></div>
                    <div class="igcell"><h5>Parents receive updates regarding the academic achievements of their child</h5></div>
                    <div class="igarrow"></div>
                    <div class="igcell"><h5>Parents gain direct access into the relationship between their child and their teachers</h5></div>
                </div>
            </div>

            <div id="igbusrow" class="igrow">
                <div class="igsubtitle"><h1>businesses</h1></div>
                <div class="igcnt">
                    <div class="igcell"><h5>Local businesses partner with FridgeWorthy to provide unique rewards for students, parents, and teachers</h5></div>
                    <div class="igarrow"></div>
                    <div class="igcell"><h5>Students, parents, and teachers redeem their rewards at individual businesses, providing the business with more patronage and community involvement</h5></div>
                    <div class="igarrow"></div>
                    <div class="igcell"><h5>Businesses are able to reach a larger market through the community, while also engaging in multiple fundraising opportunities and events</h5></div>
                    <div class="igcell" id="igtrophy"><img src="images/trophy.svg" alt="trophy"></div>

                </div>
            </div>
        </div>

    </section><!--end infographic-->

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
