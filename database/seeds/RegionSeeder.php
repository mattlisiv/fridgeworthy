<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class RegionSeeder extends Seeder{


    public function run(){

        $districts = \App\District::all();

        for($i=0;$i<50;$i++){
            $district = $districts->random();
            $faker = Faker\Factory::create();
            $name = $faker->city;
            $input = ['name'=>$name,'district_id'=>$district->id];
            $region = \App\Region::create($input);



        }



    }


}