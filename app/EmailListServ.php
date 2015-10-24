<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailListServ extends Model {


    protected $table = 'email_signup';

    protected $fillable = [
        'first_name','last_name','email','type'
    ];


    public function getName(){

        return $this->first_name.' '.$this->last_name;
    }

}


