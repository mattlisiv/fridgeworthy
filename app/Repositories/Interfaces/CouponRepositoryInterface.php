<?php namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface CouponRepositoryInterface{

    public function all();

    public function allWithReward();

    public function find($id);

    public function store($input);

    public function update($id,$input);

    public function destroy($id);

    public function filterCouponsByUnclaimedStatus(Collection $collection);

    public function filterCouponsByUnredeemedStatus(Collection $collection);

    public function filterCouponsByFlaggedStatus(Collection $collection);

    public function filterCouponsByRedeemedStatus(Collection $collection);

}