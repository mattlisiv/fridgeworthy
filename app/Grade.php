<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 3/31/15
 * Time: 7:46 PM
 */

namespace app;

use Illuminate\Database\Eloquent\Model;


class Grade extends Model{


    protected $table = 'grades';

    protected $fillable = [

        'numeric_grade',
        'status',
        'assignment_id'
    ];


}