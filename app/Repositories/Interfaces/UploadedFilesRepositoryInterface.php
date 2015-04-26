<?php namespace App\Repositories\Interfaces;

interface UploadedFilesRepositoryInterface{

    public function store($input);


    public function delete($id);

}