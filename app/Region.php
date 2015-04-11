<?php namespace App\FridgeWorthy;

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
}
