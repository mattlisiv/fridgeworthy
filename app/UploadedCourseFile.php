<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 3/29/15
 * Time: 8:22 PM
 */

namespace App;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Exception;

class UploadedCourseFile extends Model{


    protected $table = 'course_files';

    protected $fillable = [

        'filename',
        'course_id',
        'file_path'
    ];

    /**Relationships **/
    public function course(){

        return $this->belongsTo('App\Course');
    }



}