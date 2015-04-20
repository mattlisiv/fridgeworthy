<?php namespace App;

class BusinessManager extends User{

    public static function create(array $attributes){


        $model = new static($attributes);

        $model->save();

        $model->attachRole(Role::businessManager());

        return $model;


    }

    public function business(){


        return $this->belongsTo('App\Business');
    }

}


