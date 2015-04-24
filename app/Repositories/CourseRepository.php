<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 4/8/15
 * Time: 5:55 PM
 */

namespace App\Repositories;


use App\Course;
use App\Repositories\Interfaces\CourseRepositoryInterface;

class CourseRepository implements CourseRepositoryInterface{


    public function all(){


        return Course::all();

    }

    public function find($id){

        return Course::findOrFail($id);
    }


    public function findWithAssignments($id){

        return Course::with('assignments')->find($id);
    }

    public function findWithAssignmentsAndGrades($id){


        return Course::with('assignments')->with('grades')->with('students')->find($id);

    }

    public function update($id, $input)
    {
        $course = Course::findOrFail($id);
        $course->update($input);
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
    }
}