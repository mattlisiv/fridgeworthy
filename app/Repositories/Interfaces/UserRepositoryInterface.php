<?php namespace App\Repositories\Interfaces;


interface UserRepositoryInterface{

    public function all();

    public function allStudents();

    public function allTeachers();

    public function allAdmins();

    public function allBusinessManagers();

    public function allParents();

    public function find($id);

    public function destroy($id);

    public function update($id,$input);

    public function store($input);

}