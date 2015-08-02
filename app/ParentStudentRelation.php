<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentStudentRelation extends Model {

    protected $table = 'parent_student';

    protected $fillable = [

        'parent_id',
        'student_id',
        'status',
    ];

}
