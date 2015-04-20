<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class SchoolSeeder extends Seeder{

    public function run(){

        $faker = Faker\Factory::create();
        $regions = App\Region::all();
        for($i = 0;$i<25;$i++){
            $region = $regions->random();
            $name = $faker->company;
            $types = array('other','middle','high','elementary');
            $type = array_rand($types,1);


            $input = ['name'=>$name,'type'=>$type,'region_id'=>$region->id];
            $school =\App\School::create($input);
        }




    }


}