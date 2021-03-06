<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model {

	protected $table = "regions";

    protected $fillable = [
      'name',
      'district_id'
    ];


    public function district(){


        return $this->belongsTo('App\District');
    }

    public function schools(){

        return $this->hasMany('App\School');
    }

    public function users(){

        return $this->hasManyThrough('App\User','App\School');
    }
}
