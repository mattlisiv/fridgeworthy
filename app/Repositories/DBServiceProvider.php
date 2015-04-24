<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;


class DBServiceProvider extends ServiceProvider{



    public function boot(){


    }


    public function register()
    {

        $this->app->bind(
            'App\Repositories\Interfaces\AssignmentRepositoryInterface',
            'App\Repositories\AssignmentRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\BusinessRepositoryInterface',
            'App\Repositories\BusinessRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\DistrictRepositoryInterface',
            'App\Repositories\DistrictRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\CouponRepositoryInterface',
            'App\Repositories\CouponRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\CourseRepositoryInterface',
            'App\Repositories\CourseRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\GradeRepositoryInterface',
            'App\Repositories\GradeRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\RegionRepositoryInterface',
            'App\Repositories\RegionRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\RewardRepositoryInterface',
            'App\Repositories\RewardRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\RoleRepositoryInterface',
            'App\Repositories\RoleRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\SchoolRepositoryInterface',
            'App\Repositories\SchoolRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\UserRepositoryInterface',
            'App\Repositories\UserRepository'
        );

        $this->app->bind(
            'App\Repositories\Interfaces\AdminRepositoryInterface',
            'App\Repositories\AdminRepository'
        );

        $this->app->bind(
            'App\Repositories\Interfaces\BusinessManagerRepositoryInterface',
            'App\Repositories\BusinessManagerRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\ParentRepositoryInterface',
            'App\Repositories\ParentRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\StudentRepositoryInterface',
            'App\Repositories\StudentRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\TeacherRepositoryInterface',
            'App\Repositories\TeacherRepository'
        );


    }


}
