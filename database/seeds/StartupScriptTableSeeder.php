<?php

use Illuminate\Database\Seeder;



class StartupScriptTableSeeder extends Seeder
{
    public function run()
    {
        \App\RegistrationControl::create(['value'=>'open']);
    }
}
