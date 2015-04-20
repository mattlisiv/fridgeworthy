<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 4/10/15
 * Time: 9:13 PM
 */



use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class UserSeeder extends Seeder{

    public function run()
    {

        /**Create Teachers **/
        $faker = \Faker\Factory::create();
        $schools = App\School::all();

        for($i=0;$i<25;$i++){

            $school = $schools->random();
            $first_name =$faker->firstName;
            $last_name = $faker->lastName;
            $email = $faker->email;
            $password = $faker->password;
            $points = $faker->randomNumber(3);
            $status = array_rand(['active','pending','suspended','deactivate']);

            $input=['first_name' => $first_name,
                    'last_name' => $last_name,
                    'email'=>$email,
                    'password'=>$password,
                    'school_id'=>$school->id,
                    'points'=>$points,
                    'status'=>$status];

            $user = \App\Teacher::create($input);




        }


        for($i=0;$i<25;$i++){

            $school = $schools->random();
            $first_name =$faker->firstName;
            $last_name = $faker->lastName;
            $email = $faker->email;
            $parent_email = $faker->email;
            $grade = $faker->numberBetween(0,12);
            $password = $faker->password;
            $points = $faker->randomNumber(3);
            $status = array_rand(['active','pending','suspended','deactivate']);

            $input=['first_name' => $first_name,
                'last_name' => $last_name,
                'email'=>$email,
                'password'=>$password,
                'school_id'=>$school->id,
                'points'=>$points,
                'status'=>$status,
                'parent_email'=>$parent_email,
                'grade'=>$grade];

            $user = \App\Student::create($input);




        }

        for($i=0;$i<75;$i++){
            $first_name =$faker->firstName;
            $last_name = $faker->lastName;
            $email = $faker->email;
            $password = $faker->password;
            $points = $faker->randomNumber(3);
            $status = array_rand(['active','pending','suspended','deactivate']);

            $input=['first_name' => $first_name,
                'last_name' => $last_name,
                'email'=>$email,
                'password'=>$password,
                'points'=>$points,
                'status'=>$status];

            $user = \App\Guardian::create($input);




        }

        $businesses = \App\Business::all();
        for($i=0;$i<75;$i++){

            $business = $businesses->random();
            $first_name =$faker->firstName;
            $last_name = $faker->lastName;
            $email = $faker->email;
            $password = $faker->password;
            $status = array_rand(['active','pending','suspended','deactivate']);

            $input=['first_name' => $first_name,
                'last_name' => $last_name,
                'email'=>$email,
                'password'=>$password,
                'status'=>$status,
                'business_id'=>$business->id];

            $user = \App\BusinessManager::create($input);




        }

        for($i=0;$i<5;$i++){


            $first_name =$faker->firstName;
            $last_name = $faker->lastName;
            $email = $faker->email;
            $password = $faker->password;
            $status = array_rand(['active','pending','suspended','deactivate']);

            $input=['first_name' => $first_name,
                'last_name' => $last_name,
                'email'=>$email,
                'password'=>$password,
                'status'=>$status];

            $user = \App\Admin::create($input);




        }


        $input=['first_name' => 'Matt',
            'last_name' => 'Lisivick',
            'email'=>'lisivickmatt@gmail.com',
            'password'=>bcrypt('mjl2014!'),
            'status'=>'active'];

        $user = \App\Admin::create($input);





    }
}