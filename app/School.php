<?php namespace App\FridgeWorthy;

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

    public function allUsers(){

        $users = DB::table('users')->where('school_id', '=', $this->id)->get();
        return $users;

    }

    public function courses(){

        return $this->hasManyThrough('App\Course','App\User');

    }

    /**@TODO methds
     * -grades
     * -teachers
     * -students
     *
     *
     */


}
