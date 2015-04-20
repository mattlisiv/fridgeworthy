<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 4/10/15
 * Time: 9:13 PM
 */



use Illuminate\Database\Seeder;





class RoleSeeder extends Seeder{

    public function run()
    {

        $input = ['name'=>'Teacher','display_name'=>'Teacher'];
        \App\Role::create($input);
        $input = ['name'=>'Student','display_name'=>'Student'];
        \App\Role::create($input);
        $input = ['name'=>'Guardian','display_name'=>'Guardian'];
        \App\Role::create($input);
        $input = ['name'=>'BusinessManager','display_name'=>'BusinessManager'];
        \App\Role::create($input);
        $input = ['name'=>'Admin','display_name'=>'Admin'];
        \App\Role::create($input);
    }
}