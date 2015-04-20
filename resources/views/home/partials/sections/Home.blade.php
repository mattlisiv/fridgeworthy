<!--starthome-->
<section id="home">
    <header>
        <div id="homecnt">
            <div id="homecntblocks">
                <div id="hardwork">
                    <img src="/images/hardwork@2x.png" alt="Hard work pays off."/>
                </div>

                <div id="homeblocks">

                    <div id="logoblock">
                        <img src="/images/fwlogo-main.png" alt="FridgeWorthy Logo" id="logomain"/>
                        <h6>We are here to improve students' learning, educators' teaching, and parents' involvement through rewards and recognition.</h6>

                        <div id="mainlearnbtn"><a href="#aboutpanel" data-scroll="#aboutpanel" class="scrollbtn">learn more<img src="images/whitedownarrow-sm.png" alt="white down arrow"></a></div>
                    </div>

                    <div id="homeformblock">
                        <div id="sublock">
                            <h1 class="whitedkorange">sign up</h1>
                            <h6 class="white">for emails & updates</h6>
                            <form action="#" method="post" id="signup">
                                <input type="text" placeholder="first name" class="tfield"/>
                                <input type="text" placeholder="last name" class="tfield"/>
                                <input type="text" placeholder="email" class="tfield"/>
                                <span class="custom-dropdownBlue">
                                <select class="customSelect">
                                    <option value='' disabled selected style='display:none;'>i am a...</option>
                                    <option value="student">student</option>
                                    <option value="teacher">teacher</option>
                                    <option value="parent">parent</option>
                                    <option value="business">business representative</option>
                                </select>
                                </span>
                                <div class="clear"></div>
                                <button type="button" value="submit" class="smbtnblue" style="margin-top: 10px;">submit</button>
                            </form>
                        </div>

                        @if(is_null($user))
                            <div id="liblock">
                                <h1 class="whiteblue">get involved</h1>
                                <h6 class="white">with FridgeWorthy!</h6>
                                <form action="#" method="post" id="loginmain">
                                    <a href="#loginmodal" class="modal-popup"><button type="button" value="login" class="smbtn">login</button></a><br>
                                    <a href="#registrationpanel" data-scroll="#registrationpanel" class="scrollbtn"><button type="button" value="register" class="smbtn">register</button></a>
                                </form>
                            </div>
                            @endif



                    </div>
                </div><!--end homeblocks-->
            </div>
        </div>
    </header>
</section>
<!--endhomecnt-->