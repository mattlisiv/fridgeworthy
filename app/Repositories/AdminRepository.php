<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 4/8/15
 * Time: 5:55 PM
 */

namespace App\Repositories;


use App\Admin;
use App\Assignment;
use App\Repositories\Interfaces\AdminRepositoryInterface;

class AdminRepository implements AdminRepositoryInterface{


    public function all(){


        return Admin::all();

    }

    public function find($id){

        return Admin::find($id);
    }




}