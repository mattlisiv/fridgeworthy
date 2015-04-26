<?php

namespace App;

use Illuminate\Support\Facades\DB;

class Guardian extends User{


    public static function create(array $attributes){


        $model = new static($attributes);

        $model->save();

        $model->attachRole(Role::guardian());

        return $model;


    }


    public function school(){

        return $this->belongsTo('App\School');

    }

    public function students(){

        return $this->belongsToMany('App\Student','parent_student','parent_id','student_id');

    }

    public function coupons(){

        $coupons = Coupon::where('user_id','=',$this->id)->with('reward');

        return $coupons;
    }
}