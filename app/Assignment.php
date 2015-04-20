<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 3/31/15
 * Time: 7:47 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;



class Assignment extends Model{


    protected $table = 'assignments';

    protected $fillable = [

        'course_id',
        'description',
        'due_date'
    ];
    
     protected $dates = [
        'due_date'
    ];


    public function grades(){


        return $this->hasMany('App\Grade');
    }


    public function course(){

        return $this->belongsTo('App\Course');

    }


}
