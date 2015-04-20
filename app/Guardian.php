<?php

namespace App;

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



    public function coupons(){

        $coupons = DB::table('coupons')->where('user_id', '=', $this->id)->get();
        return $coupons;
    }
}