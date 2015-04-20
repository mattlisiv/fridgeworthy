<?php namespace App\Repositories\Interfaces;

interface CouponRepositoryInterface{

    public function all();

    public function allWithReward();

    public function find($id);

    public function store($input);

    public function update($id,$input);

    public function destroy($id);
}