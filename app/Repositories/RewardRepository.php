<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 4/8/15
 * Time: 5:55 PM
 */

namespace App\Repositories;


use App\Reward;
use App\Repositories\Interfaces\RewardRepositoryInterface;
use Codesleeve\Stapler\Factories\Storage;

class RewardRepository implements RewardRepositoryInterface{


    public function all(){

        return Reward::all();

    }

    public function allWithImage(){

        return Reward::with('relatedImages')->get();
    }

    public function allWithCoupons(){

        return Reward::with('coupons')->get();
    }

    public function allWithImageAndCoupons(){

        return Reward::with('coupons')->with('relatedImages')->get();
    }

    public function find($id){

        return Reward::findOrFail($id);
    }


    public function store($input)
    {
        return Reward::create($input);
    }

    public function update($id, $input)
    {
        $reward = Reward::findOrFail($id);
        return $reward->update($input);
    }

    public function destroy($id)
    {
        
        $reward = Reward::findOrFail($id);
        return $reward->delete();
    }

    public function findWithImage($id)
    {
        return Reward::with('relatedImages')->findOrFail($id);

    }

    public function findWithCoupons($id){

        return Reward::with('coupons')->findOrFail($id);
    }

    public function findWithImageAndCoupons($id)
    {
        return Reward::with('coupons')->with('relatedImages')->findOrFail($id);
    }
}