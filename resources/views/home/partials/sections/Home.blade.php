<!--starthome-->
<section id="home">
    <header>
        <div id="homecnt">
            <div id="homecntblocks">
                <div id="hardwork">
                    <img src="{{asset('images/hardwork@2x.png')}}" alt="Hard work pays off."/>
                </div>

                <div id="homeblocks">

                    <div id="logoblock">
                        <img src="{{asset('images/fwlogo-main.png')}}" alt="FridgeWorthy Logo" id="logomain"/>
                        <h6>We are here to improve students' learning, educators' teaching, and parents' involvement through rewards and recognition.</h6>

                        <div id="mainlearnbtn"><a href="#about" data-scroll="#about" class="scrollbtn">learn more<img src="{{asset('images/whitedownarrow-sm.png')}}" alt="white down arrow"></a></div>
                    </div>
                    @if(is_null($user))
                        @include('home.partials.sections.GetInvolved')
                    @else
                        <div class="fb-like" data-href="https://www.facebook.com/fridgeworthyrewards?fref=ts&amp;ref=br_tf" data-layout="box_count" data-action="like" data-show-faces="true" data-share="true"></div>
                    @endif
                </div><!--end homeblocks-->
            </div>
        </div>
    </header>
</section>