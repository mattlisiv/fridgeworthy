<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 4/8/15
 * Time: 5:55 PM
 */

namespace App\Repositories;


use App\Assignment;
use App\BusinessManager;
use App\Repositories\Interfaces\BusinessManagerRepositoryInterface;
use App\Repositories\Interfaces\BusinessRepositoryInterface;

class BusinessManagerRepository implements BusinessRepositoryInterface{


    public function all()
    {
        return BusinessManager::all();
    }

    public function find($id)
    {
        return BusinessManager::findOrFail($id);
    }

    public function store($input)
    {
        return BusinessManager::create($input);
    }

    public function update($id, $input)
    {
        $business_manager = BusinessManager::findOrFail($id);
        $business_manager->update($input);
    }

    public function destroy($id)
    {
        $business_manager =BusinessManager::findOrFail($id);
        return $business_manager->delete();
    }
}