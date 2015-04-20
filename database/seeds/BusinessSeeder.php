<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class BusinessSeeder extends Seeder{

    public function run(){

        $faker = Faker\Factory::create();
        for($i = 0;$i<25;$i++){

            $name = $faker->company;
            $website = $faker->domainName;
            $input = ['name'=>$name,'website'=>$website];
            \App\Business::create($input);

        }




    }


}