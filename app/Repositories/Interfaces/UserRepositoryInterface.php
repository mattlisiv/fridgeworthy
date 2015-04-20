<?php namespace App\Repositories\Interfaces;


interface UserRepositoryInterface{

    public function all();

    public function find($id);

    public function destroy($id);

    public function update($id,$input);

    public function store($input);
}