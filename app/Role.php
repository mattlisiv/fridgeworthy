<?php namespace App;


use Zizaco\Entrust\Entrust;
use Zizaco\Entrust\EntrustRole;


class Role extends EntrustRole{



    function scopeTeacher($query){


    return $query->where('name','=','Teacher')->first();

    }

    function scopeStudent($query){


        return $query->where('name','=','Student')->first();

    }

    function scopeGuardian($query){


        return $query->where('name','=','Guardian')->first();

    }

    function scopeBusinessManager($query){


        return $query->where('name','=','BusinessManager')->first();

    }

    function scopeAdmin($query){


        return $query->where('name','=','Admin')->first();

    }
}