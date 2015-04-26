<?php namespace App;

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
        'email', 'password','parent_email','grade','status'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];





    public function newQuery($excludeDeleted = true){

        $builder = parent::newQuery($excludeDeleted);
        $role = 'User';
        if('App\User' != get_class($this)) {

            switch (get_class($this)) {

                case 'App\Teacher':
                    $role = 'Teacher';
                    $builder
                        ->addSelect('users.id as id','users.first_name','users.last_name',
                                    'users.school_id','users.email','users.points','users.status',
                                    'users.created_at','users.updated_at')
                        ->leftJoin('role_user','users.id','=','role_user.user_id')
                        ->leftJoin('roles','role_user.role_id','=','roles.id')
                        ->where('roles.name','=',$role);
                    break;
                case 'App\Student':
                    $role = 'Student';
                    $builder->addSelect('users.id as id','users.first_name','users.last_name',
                                        'users.school_id','users.email','users.grade','users.parent_email','users.points',
                                        'users.status','users.created_at','users.updated_at')
                        ->leftJoin('role_user','users.id','=','role_user.user_id')
                        ->leftJoin('roles','role_user.role_id','=','roles.id')
                        ->where('roles.name','=',$role);
                    break;
                case 'App\Guardian':
                    $role = 'Guardian';
                    $builder->addSelect('users.id as id','users.first_name','users.last_name',
                        'users.school_id','users.email','users.points',
                        'users.status','users.created_at','users.updated_at')
                        ->leftJoin('role_user','users.id','=','role_user.user_id')
                        ->leftJoin('roles','role_user.role_id','=','roles.id')
                        ->where('roles.name','=',$role);
                    break;
                case 'App\Admin';
                    $role = 'Admin';
                    $builder->addSelect('users.id as id','users.first_name','users.last_name','users.email',
                        'users.status','users.created_at','users.updated_at')
                        ->leftJoin('role_user','users.id','=','role_user.user_id')
                        ->leftJoin('roles','role_user.role_id','=','roles.id')
                        ->where('roles.name','=',$role);
                    break;
                case 'App\BusinessManager':
                    $role = 'BusinessManager';
                    $builder->addSelect('users.id as id','users.business_id','users.first_name','users.last_name','users.email',
                        'users.status','users.created_at','users.updated_at')
                        ->leftJoin('role_user','users.id','=','role_user.user_id')
                        ->leftJoin('roles','role_user.role_id','=','roles.id')
                        ->where('roles.name','=',$role);
                    break;
                default:
                    $role = 'User';
                    $builder->leftJoin('role_user','users.id','=','role_user.user_id')
                        ->leftJoin('roles','role_user.role_id','=','roles.id')
                        ->where('roles.name','=',$role);
            }


            return $builder;

        }

        return $builder;


    }

    public function getName(){

        return $this->first_name.' '.$this->last_name;
    }

    public function getFullNameAttribute(){

        return $this->first_name.' '.$this->last_name;
    }

    public function removeThisUser(){

        return User::where('users.id','=',$this->id)->delete();
    }

    public function newFromBuilder($attributes = array(),$connection = NULL){


        $parent = parent::newFromBuilder($attributes);
        if($parent->hasRole('Teacher')){
            $instance = new Teacher();
            $instance->exists = true;
            $instance->setRawAttributes((array) $attributes,true);
            return $instance;
        }

        if($parent->hasRole('Student')){
            $instance = new Student();
            $instance->exists = true;
            $instance->setRawAttributes((array) $attributes,true);
            return $instance;

        }
        if($parent->hasRole('Guardian')){
            $instance = new Guardian();
            $instance->exists = true;
            $instance->setRawAttributes((array) $attributes,true);
            return $instance;

        }
        if($parent->hasRole('BusinessManager')){
            $instance = new BusinessManager();
            $instance->exists = true;
            $instance->setRawAttributes((array) $attributes,true);
            return $instance;

        }
        if($parent->hasRole('Admin')){
            $instance = new Admin();
            $instance->exists = true;
            $instance->setRawAttributes((array) $attributes,true);
            return $instance;
        }

        else{

            return $parent;
        }
    }


}







