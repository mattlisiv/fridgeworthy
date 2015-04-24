<?php namespace App\Repositories\Interfaces;

interface BusinessManagerRepositoryInterface{

    public function all();

    public function find($id);

    public function delete($id);

    public function update($id,$input);

}