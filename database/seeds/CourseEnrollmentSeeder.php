<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class CourseEnrollmentSeeder extends Seeder{

    public function run(){


        $faker = Faker\Factory::create();
        $students = \App\Student::all();
        $courses = \App\Course::all();
        for($i = 0;$i<25;$i++){

            $student = $students->random();
            $course = $courses->random();
            if(!$student->enrolledInCourse($course)){
                $student->enrollInCourse($course);
            }


        }

    }


}