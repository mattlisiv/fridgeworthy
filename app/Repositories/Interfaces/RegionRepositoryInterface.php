<?php namespace App\Repositories;


interface RegionRepositoryInterface{

    public function getAll();

    public function find($id);


}