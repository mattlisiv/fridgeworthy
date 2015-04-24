<?php namespace App\Repositories\Interfaces;

interface ParentRepositoryInterface{

    public function all();

    public function find($id);

    public function update($id,$input);

    public function delete($id);

    public function findWithChildren($id);

}