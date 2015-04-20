<?php namespace App\Repositories\Interfaces;

interface DistrictRepositoryInterface{

    public function all();

    public function find($id);

    public function findWithRegion($id);

    public function store($input);

    public function update($id,$input);

    public function destroy($id);


}