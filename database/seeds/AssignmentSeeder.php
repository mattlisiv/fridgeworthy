<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class AssignmentSeeder extends Seeder{

    public function run(){

        $courses = \App\Course::all();
        $faker = \Faker\Factory::create();
        for($i = 0;$i<65;$i++){

            $course = $courses->random();
            $name = $faker->colorName;
            $description = $faker->sentence(5);
            $due_date = $faker->dateTime;


            $input = ['course_id'=>$course->id,'name'=>$name,'description'=>$description,'due_date'=>$due_date];
            \App\Assignment::create($input);
        }

    }


}