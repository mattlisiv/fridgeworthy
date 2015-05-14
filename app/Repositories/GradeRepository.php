<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 4/8/15
 * Time: 5:55 PM
 */

namespace App\Repositories;


use App\Grade;
use App\Repositories\Interfaces\GradeRepositoryInterface;

class GradeRepository implements GradeRepositoryInterface{


    public function all(){


        return Grade::all();

    }

    public function find($id){

        return Grade::findOrFail($id);
    }


    public function findWithAssignment($id)
    {
        return Grade::findOrFail($id)->with('assignment');
    }

    public function store($input)
    {
       return Grade::create($input);
    }
}