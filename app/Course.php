<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

    protected $table = 'courses';

    protected $fillable = [

        'name',
        'description',
        'teacher_id'
    ];


    public function isTeacher(Teacher $teacher){

        if($this->teacher->id==$teacher->id){
            return true;
        }else{
            return false;
        }
    }

    public function teacher(){

        return $this->belongsTo('App\User','teacher_id');
    }

    public function students(){

        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function school(){

        $teacher = Teacher::findOrFail($this->teacher->id);
        return $teacher->school;
    }

    public function assignments(){


        return $this->hasMany('App\Assignment');
    }

    public function grades(){

        return $this->hasManyThrough('App\Grade','App\Assignment');
    }

    public function uploadedFiles(){

        return $this->hasMany('App\UploadedCourseFile');
    }



}
