<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 4/8/15
 * Time: 5:55 PM
 */

namespace App\Repositories;


use App\Business;
use App\Repositories\Interfaces\BusinessRepositoryInterface;
use Illuminate\Support\Facades\Bus;

class BusinessRepository implements BusinessRepositoryInterface{



    public function all()
    {
        return Business::all();
    }

    public function find($id){

        return Business::findOrFail($id);
    }


    public function store($input)
    {
        return Business::create($input);
    }

    public function update($id,$input)
    {
        $business = Business::findOrFail($id);
        return $business->update($input);
    }

    public function destroy($id){

        $business = Business::findOrFail($id);
        return $business->delete();

    }
}