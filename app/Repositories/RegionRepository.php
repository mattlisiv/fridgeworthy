<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 4/8/15
 * Time: 5:55 PM
 */

namespace App\Repositories;


use App\Region;
use App\Repositories\Interfaces\RegionRepositoryInterface;
class RegionRepository implements RegionRepositoryInterface{

    public function all(){

        return Region::all();
    }

    public function find($id){

        return Region::findOrFail($id);
    }

    public function store($input){

        return Region::create($input);
    }

    public function update($id,$input){

        $region = Region::findOrFail($id);
        return $region->update($input);
    }

    public function destroy($id){

        $region = Region::findOrFail($id);
        return $region->delete();
    }
}