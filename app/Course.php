<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

    protected $table = 'courses';

    protected $fillable = [

        'name',
        'description',
        'teacher_id'
    ];


    public function teacher(){

        return $this->belongsTo('App\User');
    }

    public function students(){

        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function assignments(){


        return $this->hasMany('App\Assignment');
    }

    public function grades(){

        return $this->hasManyThrough('App\Grade','App\Assignment');
    }

    /**@TODO define methods
     * -school
     *
     *
     *
     */



}
