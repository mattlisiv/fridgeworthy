<?php namespace App;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Teacher extends User{


    public static function create(array $attributes = []){


        $model = new static($attributes);

        $model->save();

        $model->attachRole(Role::teacher());

        return $model;


    }

    public function region(){


        return $this->school->region();

    }

    public function district(){

        return $this->region->district();


    }

    public function school(){


        return $this->belongsTo('App\School');
    }


    public function coupons(){

        $coupons = Coupon::where('user_id','=',$this->id)->with('reward');
        return $coupons;
    }

    public function courses(){

        return $this->hasMany('App\Course');

    }

    public function assignments(){


        return $this->hasManyThrough('App\Assignment','App\Course');

    }

    public function upcomingAssignments(){

        return $this->assignments()->where('due_date','>',Carbon::now());

    }

}

