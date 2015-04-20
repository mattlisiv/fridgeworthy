<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 4/8/15
 * Time: 5:55 PM
 */

namespace App\Repositories;


use App\District;
use App\Repositories\Interfaces\DistrictRepositoryInterface;


class DistrictRepository implements DistrictRepositoryInterface{


    public function all(){

        return District::all();
    }

    public function find($id){

        return District::findOrFail($id);
    }

    public function findWithRegion($id){

        return District::with('regions')->findOrFail($id);
    }


    public function store($input)
    {
        return District::create($input);
    }

    public function update($id,$input)
    {
        $district = District::findOrFail($id);
        return $district->update($input);
    }

    public function destroy($id){

        $district = District::findOrFail($id);
        return $district->delete();

    }
}