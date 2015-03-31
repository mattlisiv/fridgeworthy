<?php namespace App;


use Illuminate\Database\Eloquent\Model;

class Business extends Model {

    protected $table = 'businesses';

    protected $fillable = [

        'name',
        'website',
    ];


    public function rewards(){

        return $this->hasMany('App\Rewards');
    }
}