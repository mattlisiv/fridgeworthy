<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 3/31/15
 * Time: 7:47 PM
 */

namespace app;

use Illuminate\Database\Eloquent\Model;



class Assignment extends Model{


    protected $table = 'assignments';

    protected $fillable = [

        'course_id',
        'description',
        'due_date'
    ];

}