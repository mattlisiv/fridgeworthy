<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\DB;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

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
	protected $fillable = ['first_name','last_name','school_id', 'points' ,
        'email', 'password','parent_email','grade'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];



    public function courses(){
       if($this->hasRole('teacher')){

           return $this->hasMany('App\Course');

       }else if($this->hasRole('student')){

           return $this->belongsToMany('Course')->withTimestamps();
       }

    }

    public function enrolledInCourse($name){

        foreach($this->courses() as $course){

            if($course->name == $name){
                return true;
            }
        }

        return false;
    }

    public function enrollInCourse($course){

        if($this->hasRole('student')){

            return $this->courses()->attach($course);
        }

    }


    public function hasRole($name){

        foreach($this->roles as $role){
            if($role->name == $name){
                return true;
            }

        }
        return false;
    }

    public function assignRole($role){

        return $this->roles()->attach($role);
    }

    public function removeRole($role){

        return $this->roles()->detach($role);
    }

    public function school(){


        return $this->belongsTo('App\School');
    }

    public function coupons(){

        $coupons = DB::table('coupons')->where('user_id', '=', $this->id)->get();
        return $coupons;
    }

    public function roles(){

        return $this->belongsToMany('App\Role')->withTimestamps();
    }






/**@TODO
 * enroll in class
 * deroll from class
 * ----add status to enrollment table
 *
 * */

}
