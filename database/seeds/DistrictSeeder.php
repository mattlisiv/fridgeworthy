<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DistrictSeeder extends Seeder{

    public function run(){

        $faker = Faker\Factory::create();
        for($i = 0;$i<25;$i++){

            $name = $faker->city;
            $state = $faker->stateAbbr;
            $input = ['name'=>$name,'state'=>$state];
            $district =\App\District::create($input);
        }

    }


}