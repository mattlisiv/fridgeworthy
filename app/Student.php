<?php namespace App;



use phpDocumentor\Reflection\DocBlock\Type\Collection;
use Illuminate\Support\Facades\DB;

class Student extends User{


    public static function create(array $attributes){


        $model = new static($attributes);

        $model->save();

        $model->attachRole(Role::student());

        return $model;


    }

    public function school(){


        return $this->belongsTo('App\School');
    }


    public function enrolledInCourse($course){


        return !is_null($this->courses()->where('id','=',$course->id)->first());



    }

    public function statusInCourse($course){

        if($this->enrolledInCourse($course)){

            $pivot = $this->courses()->withPivot(['status'])->first()->pivot->status;
            return $pivot;

        }else{

            return 'NOT_ENROLLED';
        }

    }

    public function enrollInCourse($input){


        $this->courses()->save($input,['status'=>'unconfirmed']);


    }



    public function courses(){

        return $this->belongsToMany('App\Course','course_user','user_id','course_id');

    }

    public function assignments(){

        return Assignment::select('assignments.*')
            ->leftJoin('courses','courses.id','=','assignments.course_id')
            ->leftJoin('course_user','course_user.course_id','=','courses.id')
            ->where('course_user.user_id','=',$this->id)
            ->get();



    }

    public function parent(){

        return $this->belongsToMany('App\User','parent_student','student_id','parent_id');
    }

    public function grades(){

        return $this->hasMany('App\Grade');
    }

    public function coupons(){

        $coupons = Coupon::where('user_id','=',$this->id)->with('reward');
        return $coupons;
    }


}

