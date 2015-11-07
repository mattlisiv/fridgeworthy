<?php namespace App;


class Admin extends User{


    public static function create(array $attributes = []){


        $model = new static($attributes);

        $model->save();

        $model->attachRole(Role::admin());

        return $model;


    }

}


