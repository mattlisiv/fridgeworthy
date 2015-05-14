<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 3/31/15
 * Time: 7:46 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;


class Grade extends Model{


    protected $table = 'grades';

    protected $fillable = [

        'numeric_grade',
        'status',
        'assignment_id',
        'student_id'
    ];



    public function student(){
        
        return $this->belongsTo('App\User','student_id');
    }

    public function assignment(){


        return $this->belongsTo('App\Assignment','assignment_id')->with('course');
    }





}