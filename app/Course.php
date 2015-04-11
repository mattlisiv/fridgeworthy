<?php namespace App\FridgeWorthy;

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

        return $this->belongsToMany('User')->withTimestamps();
    }

    public function assignments(){


        return $this->hasMany('App\Assignment');
    }

    /**@TODO define methods
     * -school
     *
     *
     *
     */



}
