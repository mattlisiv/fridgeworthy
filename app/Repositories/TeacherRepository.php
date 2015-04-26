<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 4/23/15
 * Time: 6:51 PM
 */

namespace App\Repositories;



use App\Repositories\Interfaces\TeacherRepositoryInterface;
use App\Teacher;

class TeacherRepository implements TeacherRepositoryInterface{


    public function all()
    {
        return Teacher::all();
    }

    public function find($id)
    {
        return Teacher::findOrFail($id);
    }

    public function findWithCourses($id)
    {
        return Teacher::with('courses')->findOrFail($id);
    }

    public function findWithCoursesAndAssignments($id)
    {
        return Teacher::with('courses')->with('assignments')->findOrFail($id);
    }
}