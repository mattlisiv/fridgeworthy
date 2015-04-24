<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 4/8/15
 * Time: 5:55 PM
 */

namespace App\Repositories;


use App\Assignment;
use App\Repositories\Interfaces\AssignmentRepositoryInterface;

class AssignmentRepository implements AssignmentRepositoryInterface{

    public function all(){

        return Assignment::all();

    }

    public function find($id){

        return Assignment::find($id);
    }

    public function findWithGrades($id)
    {
        return Assignment::with('grades')->findOrFail($id);
    }

    public function store($input)
    {
        return Assignment::create($input);
    }

    public function update($id, $input)
    {
        $assignment = Assignment::findOrFail($id);
        return $assignment->update($input);
    }

    public function delete($id)
    {
        $assignment = Assignment::findOrFail($id);
        return $assignment->delete();
    }
}