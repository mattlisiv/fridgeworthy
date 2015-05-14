<!--start sticky nav-->
<nav class="my-sticky-element">
    <div class="navlogo">
        <div>
            <img src="{{asset("images/fwlogo-nav.png")}}" alt="FridgeWorthy logo">
        </div>
    </div>
    <div class="navrightcnt">

        @include('home.partials.nav.LoginBanner')
        <!--main desktop links-->
        <div class="navmainlinks">
            <ul>
                <li><a href="{{url('/')}}#home">home</a></li>
                <li><a href="{{url('/')}}#about" >about us</a></li>
                <li><a href="{{url('/')}}#rewards">rewards</a>
                    <ul class="dropdownmenu"><li><a href="{{action('PublicRewardController@index')}}" >rewards center</a></li></ul>
                </li>
                <li><a href="{{url('/')}}#registration" >registration</a></li>
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
                        <li class="menu-item"><a href="{{url('/')}}#home">home</a></li>
                        <li class="menu-item"><a href="{{url('/')}}#about">about us</a></li>
                        <li class="menu-item menu-item-has-children"><a href="{{url('/')}}#rewards">rewards</a>
                            <ul class="sub-menu">
                                <li class="menu-item"><a href="{{action('PublicRewardController@index')}}">rewards center</a></li>
                            </ul>
                        </li>
                        <li class="menu-item"><a href="{{url('/')}}#registration" style="border-bottom: none;">registration</a></li>
                    </ul>
                </div><!--end menu-header-->
            </div><!--end responsive-menu-->
        </div><!--mobile-nav-->

    </div><!--end right content-->
    <div class="clear"></div><!--clear both cols-->
</nav><!--end nav-->