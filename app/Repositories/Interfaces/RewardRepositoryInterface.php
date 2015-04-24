<?php namespace App\Repositories\Interfaces;

interface RewardRepositoryInterface{

    public function all();

    public function allWithImage();

    public function allWithCoupons();

    public function find($id);

    public function findWithCoupons($id);

    public function findWithImage($id);

    public function findWithImageAndCoupons($id);

    public function store($input);

    public function update($id,$input);

    public function destroy($id);

}