<?php namespace App\Http\Controllers;

use App\Grade;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Interfaces\AssignmentRepositoryInterface;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use App\Repositories\Interfaces\GradeRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentManagerController extends Controller {


    function __construct(CourseRepositoryInterface $courseRepositoryInterface,AssignmentRepositoryInterface $assignmentRepositoryInterface,
                            GradeRepositoryInterface $gradeRepositoryInterface, UserRepositoryInterface $userRepositoryInterface){
        //Register Repositories
        $this->courseRepository = $courseRepositoryInterface;
        $this->assignmentRepository = $assignmentRepositoryInterface;
        $this->gradeRepository = $gradeRepositoryInterface;
        $this->userRepository = $userRepositoryInterface;

        //Handle Course Management
        $this->middleware('CourseVerification', ['only' => ['createAssignment','viewGradeBook','submitAssignment','viewGrades']]);
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

        }else if(get_class($user)=='App\Guardian') {

            $assignments = $user->assignments();
            return view('guardian.assignments.index', compact('user', 'assignments'));
        }
        else{
                return redirect()->back();
            }

    }

    public function viewAssignment($id){

        $user = Auth::user();
        $assignment = $this->assignmentRepository->find($id);
        if(get_class($user)=='App\Student'){
            $grade = $user->grades()->where('assignment_id','=',$assignment->id)->first();
            return view('student.assignments.show',compact('user','assignment','grade'));
        }else if(get_class($user)=='App\Teacher'){
            return view('teacher.assignments.show',compact('user','assignment'));

        }else if(get_class($user)=='App\Guardian'){

            return view('guardian.assignments.show',compact('user','assignment'));
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

    public function editGrade($id){

       $user = Auth::user();
       $grade = $this->gradeRepository->find($id);
       return view('teacher.grades.edit',compact('user','grade'));

    }

    public function updateGrade(Requests\UpdateGradeRequest $request){

        var_dump($request->all());
        $grade = $this->gradeRepository->find($request['grade_id']);
        $assignment = $this->assignmentRepository->find($grade->assignment_id);
        $grade->status = 'accepted';
        if($request['action'] == 'edit'){

            $grade->numeric_grade = $request['revised_grade'];
        }
        $grade->save();
        $points_rewarded = 0;
        switch($assignment->type){

            case 'test':
                if($grade->numeric_grade>=90){
                    $points_rewarded = 5;
                }elseif($grade->numeric_grade>=80){
                    $points_rewarded = 3;
                }elseif($grade->numeric_grade>=70){
                    $points_rewarded = 1;
                }
                break;

            case 'assignment':
                if($grade->numeric_grade>=80){
                    $points_rewarded = 1;
                }
                break;

            case 'quiz':
                if($grade->numeric_grade>=90){
                    $points_rewarded = 3;
                }elseif($grade->numeric_grade>=80){
                    $points_rewarded = 2;
                }
                break;
            default:
                break;
        }

                $student = $this->userRepository->find($grade->student_id);
                $student->points +=$points_rewarded;
                $student->save();


        return redirect()->action('AssignmentManagerController@viewGradeBook',$assignment->course_id);
    }

    public function submitGrade($id){

        $user = Auth::user();
        $assignment = $this->assignmentRepository->find($id);
        $course = $assignment->course()->first();
        if($user->statusInCourse($course)=='confirmed'){
            return view('student.grades.create',compact('user','assignment'));
        }else{
            return view('student.courses.notenrolled',compact('user','assignment'));
        }

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
        $course = $this->courseRepository->find($id);
        if($user->statusInCourse($course)=='confirmed') {
            $assignments = $user->unsubmittedAssignments()->where('courses.id', '=', $course->id)->get();
            return view('student.assignments.SubmitGradeSpecific', compact('user', 'assignments', 'course'));
        }else{
            return view('student.courses.notenrolled',compact('user','assignment'));
        }

    }

    public function storeAssignment(Requests\StoreAssignmentRequest $request){

        $request['due_date'] = Carbon::createFromFormat('m/d/Y',$request['due_date']);
        $id = $this->assignmentRepository->store($request->all());
        $user = Auth::user();
        if($request['type']=='test'){
            $user->points +=5;
        }elseif($request['type']=='quiz'){
            $user->points +=3;
        }elseif($request['type']=='assignment'){
            $user->points +=1;
        }else{
            throw new \Exception('Error in retrieving type');
        }
        $user->save();
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
