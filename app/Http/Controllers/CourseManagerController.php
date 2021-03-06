<?php namespace App\Http\Controllers;

use App\Assignment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Interfaces\CourseRepositoryInterface;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseManagerController extends Controller {


    public function __construct(CourseRepositoryInterface $courseRepositoryInterface,StudentRepositoryInterface $studentRepositoryInterface){

        $this->courseRepository = $courseRepositoryInterface;
        $this->studentRepository = $studentRepositoryInterface;

        $this->middleware('CourseVerification', ['only' => ['viewCourse','managerRoster']]);

    }

    public function createCourse(){

        $user = Auth::user();
        return view('teacher.courses.create',compact('user'));
    }

    public function storeCourse(Requests\StoreCourseRequest $request){

        $user = Auth::user();
        $request['teacher_id']=$user->id;
        $this->courseRepository->store($request->all());
        return redirect()->action('CourseManagerController@viewMyCourses');


    }

    public function deleteCourse(){

        $user = Auth::user();
        $courses = $user->courses();
        return view('teacher.courses.delete',compact('user','courses'));

    }

    public function destroyCourse(Requests\DeleteCourseRequest $request){

        $course_id = $request['course_id'];


        $course = $this->courseRepository->find($course_id);


        $assignments = $course->assignments;


        foreach($assignments as $assignment){

            Grade::where('assignment_id','=',$assignment->id)->delete();

        }

        Assignment::where('course_id','=',$course->id)->delete();

        $course->delete();



        return redirect()->action('CourseManagerController@viewMyCourses');


    }


    public function enrollInCourse(){

       $user = Auth::user();
       $school = $user->school;
       $courses = $school->courses()->get();
       for($i=0;$i<count($courses);$i++){

           if($user->enrolledInCourse($courses[$i])){
               unset($courses[$i]);
           }
       }
       return view('student.courses.enrollincourse',compact('user','courses','school'));
    }

    public function enrollment(Requests\EnrollmentRequest $request){

        $user = Auth::user();
        $course = $this->courseRepository->find($request['course_id']);
        if(!$user->enrolledInCourse($course)){
            $user->enrollInCourse($course);
            return redirect()->action('CourseManagerController@viewMyCourses');
        }else{
            return redirect()->back()->with('message','Already enrolled in course');
        }

    }

    public function viewMyCourses(){

        $user = Auth::user();
        $courses = $user->courses()->get();


        if(get_class($user)=='App\Student'){
            $assignments = $user->upcomingAssignments();
            return view('student.courses.index',compact('user','courses','assignments'));
        }else if(get_class($user)=='App\Teacher'){
            $assignments = $user->assignments()->orderBy('due_date')->get();
            return view('teacher.courses.index',compact('user','courses','assignments'));
        }else if(get_class($user)=='App\Guardian'){
            $assignments = $user->upcomingAssignments();
            return view('guardian.courses.index',compact('user','courses','assignments'));
        }
        else{
            return redirect()->action('HomeController@index');
        }


    }

    public function viewCourse($id){

        $course = $this->courseRepository->findWithAssignments($id);
        $user = Auth::user();
        if(get_class($user)=='App\Student'){
            return view('student.courses.show',compact('user','course'));
        }else if(get_class($user)=='App\Teacher'){
            return view('teacher.courses.show',compact('user','course'));
        }
        else if(get_class($user)=='App\Guardian'){

            return view('guardian.courses.show',compact('user','course'));

        }else{
            return "Could not verify enrollment";
        }

    }


    public function managerRoster($id){

        $user = Auth::user();
        $course = $this->courseRepository->find($id);
        $students = $course->students()->withPivot('status')->get();
        return view('teacher.courses.roster',compact('user','course','students'));
    }

    public function updateRoster(Requests\UpdateRosterRequest $request){

        $student = $this->studentRepository->find($request['user_id']);
        $course_id = $request['course_id'];
       $student->courses()->updateExistingPivot($course_id,['status'=>$request['status']]);
        return redirect()->action('CourseManagerController@managerRoster',$course_id);

    }

    public function editCourseRoster($course_id,$student_id){

        $user = Auth::user();
        $course = $this->courseRepository->find($course_id);
        $student = $course->students()->where('id','=',$student_id)->withPivot('status')->first();
        return view('teacher.courses.EditRoster',compact('user','course','student'));

    }

}
