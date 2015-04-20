<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class CourseSeeder extends Seeder{

    public function run(){


        $faker = Faker\Factory::create();
        $teachers = \App\Teacher::all();
        for($i = 0;$i<25;$i++){

            $name = $faker->company;
            $description = $faker->sentence(20);
            $input = ['teacher_id'=>$teachers->random()->id,'name'=>$name,'description'=>$description];
            \App\Course::create($input);

        }

    }


}