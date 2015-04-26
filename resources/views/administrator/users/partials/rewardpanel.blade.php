<div class="panel panel-default">
    <div class="panel-heading">Redeemed Rewards</div>
    <div class="panel-body">
        @if(count($coupons))
        <table class="table table-striped">
            <tr><th>Reward Name</th><th>Coupon Access Code</th><th>Status</th></tr>
            @foreach($coupons as $coupon)
                <tr>
                    <td>
                        <a href="{{action('Admin\RewardController@show',$coupon->reward->id)}}">{{$coupon->reward->name}}</a></td>
                        <td><a href="{{action('Admin\CouponController@show',$coupon->id)}}">{{$coupon->access_code}}</a></td>
                    <td>{{$coupon->status}}</td>
                </tr>
                @endforeach
        </table>
        @else
            <p>No rewards have been redeemed.</p>
            @endif
    </div>
</div>