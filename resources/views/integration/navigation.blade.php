<!--start sticky nav-->
<nav class="my-sticky-element">
    <div class="navlogo"><img src="{{asset('images/fwlogo-main.png')}}" alt="FridgeWorthy logo"></div>

    <div class="navrightcnt">

        @if(is_null($user))
            @include('home.partials.nav.LoginBanner')
        @else
            @include('home.partials.nav.PointsDisplayBanner')
            @endif
                    <!--main desktop links-->
            <div class="navmainlinks">
                <ul>
                    <li><a href="#home" class="scrollbtn">home</a></li>
                    <li><a href="#aboutpanel" class="scrollbtn">about us</a></li>
                    <li><a href="#rewardspanel" class="scrollbtn">rewards</a>
                        <ul class="dropdownmenu"><li><a href="{{action('PublicRewardController@index')}}">rewards center</a></li></ul>
                    </li>

                    @if(is_null($user))
                        <li><a href="#registrationpanel" class="scrollbtn">registration</a></li>
                    @else
                        <li><a href="#myacctpanel" class="scrollbtn">my account</a>
                            <ul class="dropdownmenu">
                                <li><a href="myclasses.html">my classes</a>
                                <li><a href="#">enroll in class</a>
                                <li><a href="myclasses.html">view assignments</a>
                                <li><a href="#">my rewards</a>
                                <li><a href="#managepanel" class="scrollbtn">manage my profile</a></li>
                                <li><a href="#logoutmodal" class="modal-popup">logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div><!--end menu-header-->

            <div class="mobile-nav">
                <!--hamburger icon-->
                <div class="menu-btn" id="menu-btn">
                    <div></div>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <!--mobilelinks-->
                <div class="responsive-menu">
                    <div class="menu-header">
                        <ul id="menu-mobile-menu" class="menu">
                            <li class="menu-item"><a href="#home" class="scrollbtn">home</a></li>
                            <li class="menu-item"><a href="#aboutpanel" class="scrollbtn">about us</a></li>
                            <li class="menu-item menu-item-has-children"><a href="#rewardspanel" class="scrollbtn">rewards</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="{{action('PublicRewardController@index')}}">rewards center</a></li>
                                </ul>
                            </li>
                            @if(is_null($user))
                                <li class="menu-item"><a href="#registrationpanel" class="scrollbtn" style="border-bottom: none;">registration</a></li>
                            @else
                                <li class="menu-item menu-item-has-children"><a href="#myacctpanel" class="scrollbtn">my account</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="myclasses.html">my classes</a>
                                        <li class="menu-item"><a href="#">enroll in class</a>
                                        <li class="menu-item"><a href="myclasses.html">view assignments</a>
                                        <li class="menu-item"><a href="#">my rewards</a>
                                        <li class="menu-item"><a href="#managepanel" class="scrollbtn">manage my profile</a></li>
                                        <li class="menu-item"><a href="#logoutmodal" class="modal-popup">logout</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div><!--end menu-header-->
                </div><!--end responsive-menu-->
            </div><!--mobile-nav-->

    </div><!--end right content-->
    <div class="clear"></div><!--clear both cols-->
</nav><!--end nav-->