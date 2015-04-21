<!--start login-->
<div id="loginmodal" class="popup">
    <div class="popup-container">
        <div class="popup-content">
            <h5>Login Here</h5>
            <form action="{{action("HomeController@login")}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="email" name="email" placeholder="email"/><br>
                <input type="password" name="password" placeholder="password"/> <br>
                <button type="button" value="submit" class="popup-close js-popup-close modal-close smbtnredmodal">cancel</button>
                <button type="submit" name="login_submit" value="submit" class="smbtngreenmodal">submit</button>
            </form>
            @include('errors.list')
        </div>
    </div>
</div>