<!--rewards-->
<section id="rewards">
    <div id="rewardspancnt">
        <div class="rewpanhalf">
            <h3 class="white">enter</h3>
            <div id="textwrulesrew">
                <div class="hrrew"></div>
                <h4 class="white">the</h4>
                <div class="hrrew"></div>
            </div><!--end therow-->
            <h1 class="whiteblue">rewards center</h1>
            <div id="mainfindrewbtn"><a href="{{ action('PublicRewardController@index') }}">find rewards now!<img src="{{asset('images/whiterightarrow.png')}}" alt="white right arrow"></a></div>
        </div>
        <div class="rewpanhalf">
            <img src="{{asset('images/trophy.svg')}}" alt="trophy">
        </div>
        <div class="clear"></div><!--clear both rewpanhalf-->
    </div><!--end rewardspancnt-->
</section><!--end reward panel-->