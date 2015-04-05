<!--start logout-->
<div id="logoutmodal" class="popup">
    <div class="popup-container">
        <div class="popup-content">
            <h5>Are you sure you want to logout?</h5>
            <form action="{{action("HomeController@logout")}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="button" value="no" class="popup-close js-popup-close modal-close smbtnredmodal">no</button>
                <button type="submit" value="yes,logout" class="smbtngreenmodal">yes, logout</button>
            </form>
        </div>
    </div>
</div>