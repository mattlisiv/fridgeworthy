<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 4/8/15
 * Time: 5:55 PM
 */

namespace App\Repositories;


use App\Assignment;
use App\Repositories\Interfaces\AssignmentRepositoryInterface;

class AssignmentRepository implements AssignmentRepositoryInterface{


    public function all(){


        return Assignment::all();

    }

    public function find($id){

        return Assignment::find($id);
    }




}