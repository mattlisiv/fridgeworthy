<?php namespace App\Repositories\Interfaces;

interface AssignmentRepositoryInterface{

    public function all();

    public function find($id);

    public function findWithGrades($id);

    public function store($input);

    public function update($id,$input);

    public function delete($id);

}