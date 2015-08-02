<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
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

    public function courses(){

        return Course::select('courses.*')
            ->leftJoin('course_user','courses.id','=','course_user.course_id')
            ->leftJoin('parent_student','course_user.user_id','=','parent_student.student_id')
            ->leftJoin('users','parent_student.parent_id','=','users.id')
            ->where('users.id','=',$this->id)->groupBy('courses.id');


    }

    public function assignments(){

        return Assignment::select('assignments.*')
            ->join('courses','courses.id','=','assignments.course_id')
            ->join('course_user','courses.id','=','course_user.course_id')
            ->join('parent_student','course_user.user_id','=','parent_student.student_id')
            ->join('users','parent_student.parent_id','=','users.id')
            ->where('users.id','=',$this->id)
            ->groupBy('assignments.id')
            ->get();

    }

    public function upcomingAssignments(){

        return Assignment::select('assignments.*')
            ->join('courses','courses.id','=','assignments.course_id')
            ->join('course_user','courses.id','=','course_user.course_id')
            ->join('parent_student','course_user.user_id','=','parent_student.student_id')
            ->join('users','parent_student.parent_id','=','users.id')
            ->where('users.id','=',$this->id)
            ->groupBy('assignments.id')->orderBy('assignments.due_date')
            ->get();

    }



    public function hasStudentInCourse($course){


        return !is_null($this->courses()->where('courses.id','=',$course->id)->first());

    }
}