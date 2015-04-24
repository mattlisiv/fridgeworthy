<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class School extends Model {


    protected $table = 'schools';

    protected $fillable = [

        'name',
        'region_id'
    ];

    public function region(){


        return $this->belongsTo('App\Region');
    }

    /**Relationships **/
    
    public function district(){

        $this->region->district;
    }

    public function students(){

       return Student::where('school_id','=',$this->id);

    }

    public function teachers(){

        return Teacher::where('school_id','=',$this->id);
    }

    public function parents(){

        return Guardian::where('school_id','=',$this->id);
    }

    public function allUsers(){

        return User::where('school_id', '=', $this->id);

    }

    public function courses(){

        return $this->hasManyThrough('App\Course','App\User','school_id','teacher_id')->with('teacher');

    }


}
