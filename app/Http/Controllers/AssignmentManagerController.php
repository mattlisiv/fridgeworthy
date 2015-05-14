<?php namespace App\Http\Controllers;

use App\Grade;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Interfaces\AssignmentRepositoryInterface;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use App\Repositories\Interfaces\GradeRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentManagerController extends Controller {


    function __construct(CourseRepositoryInterface $courseRepositoryInterface,AssignmentRepositoryInterface $assignmentRepositoryInterface,
                            GradeRepositoryInterface $gradeRepositoryInterface){

        $this->courseRepository = $courseRepositoryInterface;
        $this->assignmentRepository = $assignmentRepositoryInterface;
        $this->gradeRepository = $gradeRepositoryInterface;
    }

    public function createAssignment($id){

        $user = Auth::user();
        $course = $this->courseRepository->find($id);

        return view('teacher.assignments.create',compact('user','course'));
    }


	public function viewMyAssignments(){

        $user = Auth::user();
        if(get_class($user)=='App\Student'){
            $assignments = $user->assignments();
            return view('student.assignments.index',compact('user','assignments'));
        }
        else if(get_class($user)=='App\Teacher')
        {
            $assignments = $user->assignments()->get();
            return view('teacher.assignments.index',compact('user','assignments'));

        }else{
            return redirect()->back();
        }
    }

    public function viewAssignment($id){

        $user = Auth::user();
        $assignment = $this->assignmentRepository->find($id);
        if(get_class($user)=='App\Student'){
            return view('student.assignments.show',compact('user','assignment'));
        }else if(get_class($user)=='App\Teacher'){
            return view('teacher.assignments.show',compact('user','assignment'));

        }else{
            return redirect()->back();
        }
    }

    public function storeGrade(Requests\StoreGradeRequest $request){

        $user = Auth::user();
        $request['student_id'] = $user->id;
        $request['status'] = 'pending';
        $this->gradeRepository->store($request->all());
        return redirect()->action('AssignmentManagerController@viewAssignment',$request['assignment_id']);

    }

    public function editGrade(){


    }

    public function submitGrade($id){

        $user = Auth::user();
        $assignment = $this->assignmentRepository->find($id);
        return view('student.grades.create',compact('user','assignment'));

    }

    public function updateAssignment(Requests\UpdateAssignmentRequest $request){

            $user = Auth::user();
            $request['due_date'] = Carbon::createFromFormat('m/d/Y',$request['due_date']);
            $assignment_id = $request['assignment_id'];
            unset($request['assignment_id']);
            $this->assignmentRepository->update($assignment_id,$request->all());
            return redirect()->action('AssignmentManagerController@viewAssignment',$assignment_id);

    }

    public function editAssignment($id){
        $user = Auth::user();
        $assignment = $this->assignmentRepository->find($id);
        return view('teacher.assignments.edit',compact('user','assignment'));

    }

    public function submitAssignment($id){

        $user = Auth::user();
        $assignments = $this->courseRepository->find($id)->assignments;
        return view('student.assignments.submitassignment',compact('user','assignments'));
    }

    public function storeAssignment(Requests\StoreAssignmentRequest $request){

        $request['due_date'] = Carbon::createFromFormat('m/d/Y',$request['due_date']);
        $id = $this->assignmentRepository->store($request->all());
        return redirect()->action('AssignmentManagerController@viewAssignment',$id);
    }

    public function viewGrades($id){

        $user = Auth::user();
        $course = $this->courseRepository->find($id);
        if(get_class($user)=='App\Student'){
            $grades = $user->gradesByCourse($course->id)->get();
            return view('student.grades.index',compact('user','grades','course'));

        }

    }

    public function viewIndividualGrade($id){

        $user = Auth::user();
        if(get_class($user)=='App\Student'){
            $grade = $this->gradeRepository->find($id);
            return view('student.grades.show',compact('user','grade'));

        }

    }

    public function viewGradeBook($id){

        $user = Auth::user();
        $course = $this->courseRepository->findWithAssignmentsAndGrades($id);
        $assignments = $course->assignments()->get();

        return view('teacher.grades.index',compact('user','assignments','course'));



    }


}
