<?php namespace App\Repositories\Interfaces;

interface GradeRepositoryInterface{

    public function all();

    public function find($id);

    public function findWithAssignment($id);

    public function store($input);

}