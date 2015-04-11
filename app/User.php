<?php namespace App\FridgeWorthy;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\DB;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword, EntrustUserTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['first_name','last_name','school_id', 'business_id','points' ,
        'email', 'password','parent_email','grade'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];



    public function courses(){


    }

    public function enrolledInCourse($course){



    }

    public function enrollInCourse($course){



    }



    public function school(){


        return $this->belongsTo('App\School');
    }

    public function coupons(){

        $coupons = DB::table('coupons')->where('user_id', '=', $this->id)->get();
        return $coupons;
    }







/**@TODO
 * enroll in class
 * deroll from class
 * ----add status to enrollment table
 *
 * */

}
