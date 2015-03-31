<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model {


    protected $table = 'schools';

    protected $fillable = [

        'name',
        'region_id'
    ];

    public function region(){


        return $this->belongsTo('App\Region');
    }

    public function district(){

        $this->region->district;
    }
}
