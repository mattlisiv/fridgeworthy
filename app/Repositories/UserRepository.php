<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 4/8/15
 * Time: 5:55 PM
 */

namespace App\Repositories;


use App\User;
use App\Teacher;
use App\Student;
use App\Guardian;
use App\Admin;
use App\BusinessManager;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface{


    public function all(){


        return User::all();

    }

    public function allTeachers(){

        return Teacher::all();
    }

    public function allParents(){

        return Guardian::all();
    }

    public function allStudents(){

        return Student::all();
    }

    public function allAdmins(){

        return Admin::all();

    }

    public function allBusinessManagers(){

        return BusinessManager::all();
    }

    public function find($id){

        return User::findOrFail($id);
    }

    public function destroy($id){

        $user = User::findOrFail($id);
        return $user->removeThisUser();
    }

    public function update($id,$input){

        $user = User::findOrFail($id);
        $password_reset = false;
        if($input['password_reset']=='reset_yes'){

            $faker = Factory::create();
            $password = bcrypt($faker->password(6,15));
            $password_reset = true;

        }

        switch($input['role']){

            case '1':
                $parameters = ['first_name'=>$input['first_name'],'last_name'=>$input['last_name'],
                    'school_id'=>$input['school_id'],
                    'status'=>$input['status'],'points'=>$input['points'],'email'=>$input['email']];
                if($password_reset){
                    array_add($parameters,'password',$password);
                }
                $user->update($parameters);
                break;
            case '2':
                $parameters = ['first_name'=>$input['first_name'],'last_name'=>$input['last_name'],
                    'school_id'=>$input['school_id'],
                    'status'=>$input['status'],'points'=>$input['points'],'grade'=>$input['grade'],
                    'parent_email'=>$input['parent_email'],'email'=>$input['email']];
                if($password_reset){
                    array_add($parameters,'password',$password);
                }
                $user->update($parameters);
                break;
            case '3':

                $parameters = ['first_name'=>$input['first_name'],'last_name'=>$input['last_name'],
                    'school_id'=>$input['school_id'],
                    'status'=>$input['status'],'points'=>$input['points'],'email'=>$input['email']];
                $user->update($parameters);
                if($password_reset){
                    array_add($parameters,'password',$password);
                }
                break;
            case '4':

                $parameters = ['first_name'=>$input['first_name'],'last_name'=>$input['last_name'],
                    'business_id'=>$input['business_id'],
                    'status'=>$input['status'],'points'=>$input['points'],'email'=>$input['email']];
                $user->update($parameters);
                if($password_reset){
                    array_add($parameters,'password',$password);
                }
                break;
            case '5':

                $parameters = ['first_name'=>$input['first_name'],'last_name'=>$input['last_name'],
                    'status'=>$input['status'],'email'=>$input['email']];
                $user->update($parameters);
                if($password_reset){
                    array_add($parameters,'password',$password);
                }
                break;
            default:
                return redirect()->setStatusCode(400);

        }
    }


    public function store($input)
    {
        if($input['password_type']=='auto-create'){

            $faker = Factory::create();
            $password = $faker->password(6,15);
        }else{

            $password = bcrypt($input['password']);
        }

        switch($input['role']){
            case '1':
                $parameters = ['first_name'=>$input['first_name'],'last_name'=>$input['last_name'],
                    'password'=>$password,'school_id'=>$input['school_id'],
                    'status'=>$input['status'],'points'=>$input['points'],'email'=>$input['email']];
                Teacher::create($parameters);
                break;
            case '2':
                $parameters = ['first_name'=>$input['first_name'],'last_name'=>$input['last_name'],
                    'password'=>$password,'school_id'=>$input['school_id'],
                    'status'=>$input['status'],'points'=>$input['points'],'grade'=>$input['grade'],
                    'parent_email'=>$input['parent_email'],'email'=>$input['email']];
                Student::create($parameters);
                break;
            case '3':

                $parameters = ['first_name'=>$input['first_name'],'last_name'=>$input['last_name'],
                    'password'=>$password,'school_id'=>$input['school_id'],
                    'status'=>$input['status'],'points'=>$input['points'],'email'=>$input['email']];
                Guardian::create($parameters);
                break;
            case '4':

                $parameters = ['first_name'=>$input['first_name'],'last_name'=>$input['last_name'],
                    'password'=>$password,'business_id'=>$input['business_id'],
                    'status'=>$input['status'],'points'=>$input['points'],'email'=>$input['email']];
                BusinessManager::create($parameters);
                break;
            case '5':

                $parameters = ['first_name'=>$input['first_name'],'last_name'=>$input['last_name'],
                    'password'=>$password, 'status'=>$input['status'],'email'=>$input['email']];
                Admin::create($parameters);
                break;
            default:
                return redirect()->setStatusCode(400);

        }
    }
}