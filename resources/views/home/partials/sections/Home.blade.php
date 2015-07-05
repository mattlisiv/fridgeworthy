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
                        <div id="buslogos">
                            <p>Some of our participating businesses:</p>

                            <div id="buslogoscroll" class="scroll-img">
                                <ul><!--placeholder for appended sbox lis-->
                                </ul>
                            </div>

                            <div id="sbox" style="display: none;">
                                <ul>
                                    <li><img src="images/part-bus-logos/abshair-sm.gif" alt="Absolute Hair Inc"></li>
                                    <li><img src="images/part-bus-logos/arena-sm.gif" alt="Arena Tavern"></li>
                                    <li><img src="images/part-bus-logos/davebusters-sm.jpg" alt="Dave &amp; Buster's"></li>
                                    <li><img src="images/part-bus-logos/dunkin-sm.gif" alt="Dunkin' Donuts"></li>
                                    <li><img src="images/part-bus-logos/lazercity-sm.jpg" alt="Lazer City"></li>
                                    <li><img src="images/part-bus-logos/marcos-sm.gif" alt="Marco's Pizza"></li>
                                    <li><img src="images/part-bus-logos/mtimes-sm.gif" alt="Medieval Times"></li>
                                    <li><img src="images/part-bus-logos/stars-sm.gif" alt="Stars and Strikes"></li>
                                    <li><img src="images/part-bus-logos/tomchee-sm.gif" alt="Tom + Chee"></li>
                                    <li><img src="images/part-bus-logos/totalhealth-sm.jpg" alt="Total Health Spa"></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                        @include('home.partials.sections.GetInvolved')


                </div><!--end homeblocks-->
            </div>
        </div>
    </header>
</section>