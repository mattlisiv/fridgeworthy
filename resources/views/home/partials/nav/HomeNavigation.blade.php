<!--start sticky nav-->
<nav class="my-sticky-element">
    <div class="navlogo">
        <div>
            <img src="images/fwlogo-nav.png" alt="FridgeWorthy logo">
        </div>
    </div>
    <div class="navrightcnt">

        @if(is_null($user))
            @include('home.partials.nav.LoginBanner')
        @else
            @if(get_class($user)=='App\Student' || get_class($user)=='App\Guardian' || get_class($user)=='App\Teacher')
                @include('home.partials.nav.PointsDisplayBanner')
            @elseif(get_class($user)=='App\Admin')
                @include('home.partials.nav.AdminBanner')
            @elseif(get_class($user)=='App\BusinessManager')
                @include('home.partials.nav.BusinessManagerBanner')
                @endif
                @endif

                        <!--main desktop links-->
                <div class="navmainlinks">

                    <ul>
                        <li><a href="#home" class="scrollbtn">home</a></li>
                        <li><a href="#about" class="scrollbtn">about us</a></li>
                        <li><a href="#rewards" class="scrollbtn">rewards</a>
                            <ul class="dropdownmenu"><li><a href="{{action('PublicRewardController@index')}}" >rewards center</a></li></ul>
                        </li>
                        @if(is_null($user))
                            <li><a href="#registration" class="scrollbtn">registration</a></li>
                        @else
                            <li><a href="#myacct">my account</a>
                                <ul class="dropdownmenu">
                                    <li><a href="#logoutmodal" class="modal-popup">logout</a></li>
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
                                <li class="menu-item"><a href="#about" class="scrollbtn">about us</a></li>
                                <li class="menu-item menu-item-has-children"><a href="#rewards" class="scrollbtn">rewards</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="rewardscenter.html" class="scrollbtn">rewards center</a></li>
                                    </ul>
                                </li>
                                @if(is_null($user))
                                    <li class="menu-item"><a href="#registration" class="scrollbtn" style="border-bottom: none;">registration</a></li>
                                @else
                                    <li class="menu-item menu-item-has-children"><a href="#myaccount" class="scrollbtn">my account</a>
                                        <ul class="sub-menu">
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