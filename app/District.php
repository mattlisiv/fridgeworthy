<?php namespace App\FridgeWorthy;

use Illuminate\Database\Eloquent\Model;

class District extends Model {

	protected $table = 'districts';

    protected $fillable = [
        'name'
    ];


    /** Relationships **/
    public function regions(){

        return $this->hasMany('App\Region');
    }
    
    public function schools(){
    	
    	return $this->hasManyThrough('App\School','App\Region');
    }
}
