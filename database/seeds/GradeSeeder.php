<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class GradeSeeder extends Seeder{

    public function run(){


        $faker = Faker\Factory::create();
        $students = \App\Student::all();

        for($i = 0;$i<50;$i++){


            $student = $students->random();
            if($student->assignments()->toArray()!=null){

                $assignment = $student->assignments()->random();
                $numeric_grade = $faker->numberBetween(0,100);

                $input = ['student_id'=>$student->id,'assignment_id'=>$assignment->id,'numeric_grade'=>$numeric_grade,'status'=>'pending'];
                \App\Grade::create($input);
            }


        }

    }


}