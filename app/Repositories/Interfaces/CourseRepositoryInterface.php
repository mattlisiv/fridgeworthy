<?php namespace App\Repositories\Interfaces;

interface CourseRepositoryInterface{

    public function all();

    public function find($id);

    public function findWithAssignments($id);

    public function findWithAssignmentsAndGrades($id);

    public function update($id,$input);

    public function destroy($id);

}