<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 4/8/15
 * Time: 5:55 PM
 */

namespace App\Repositories;


use App\School;
use App\Repositories\Interfaces\SchoolRepositoryInterface;

class SchoolRepository implements SchoolRepositoryInterface{

    public function all(){

        return School::all();
    }

    public function find($id){

        return School::findOrFail($id);
    }

    public function store($input)
    {
        return School::create($input);
    }

    public function update($id,$input)
    {
        $school = School::findOrFail($id);
        return $school->update($input);
    }

    public function destroy($id){

        $school = School::findOrFail($id);
        return $school->delete();
    }
}