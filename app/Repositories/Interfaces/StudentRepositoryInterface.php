<?php namespace App\Repositories\Interfaces;

interface StudentRepositoryInterface{

    public function all();

    public function find($id);

    public function findWithCourses($id);

    public function findWithCoursesAndAssignments($id);

}