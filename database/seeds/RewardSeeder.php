<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class RewardSeeder extends Seeder{

    public function run(){

        $businesses = \App\Business::all();
        $faker = \Faker\Factory::create();
        for($i=0;$i<40;$i++){

            $business = $businesses->random();
            $name = $faker->company;
            $description = $faker->text(50);
            $expiration =$faker->dateTime();
            $points_required = $faker->randomNumber(2);
            $dollar_amount = $faker->randomFloat(2);

            $input = ['business_id'=>$business->id,
                      'name'=>$name,
                      'expiration'=>$expiration,
                      'points_required'=>$points_required,
                      'dollar_amount'=>$dollar_amount,
                      'description'=>$description];

            \App\Reward::create($input);

        }

    }


}