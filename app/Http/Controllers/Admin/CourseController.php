<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminCourseRequest as AdminCourseRequest;
use App\Repositories\Interfaces\CourseRepositoryInterface as CourseRepositoryInterface;
use App\Repositories\Interfaces\TeacherRepositoryInterface;
use Illuminate\Http\Request;

class CourseController extends Controller {


    public function __construct( CourseRepositoryInterface $courseRepositoryInterface,TeacherRepositoryInterface $teacherRepositoryInterface){

        $this->courseRepository = $courseRepositoryInterface;
        $this->teacherRepository = $teacherRepositoryInterface;

    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $pageTitle = "Course Manager";
        $courses = $this->courseRepository->all();
        return view('administrator.courses.index',compact('pageTitle','courses'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$pageTitle = "Create Course";
        $teachers = $this->teacherRepository->all();
        return view('administrator.courses.create',compact('pageTitle','teachers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AdminCourseRequest $request)
	{
        $this->courseRepository->store($request->all());
        return redirect()->action('Admin\CourseController@index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

        $course = $this->courseRepository->findWithAssignmentsAndGrades($id);
	    $pageTitle = $course->name;
        return view('administrator.courses.show',compact('course','pageTitle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$course = $this->courseRepository->find($id);
        $pageTitle = 'Edit '.$course->name;
        return view('administrator.courses.edit',compact('course','pageTitle'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Requests\Admin\AdminCourseEditRequest $request
     * @return Response
     */
	public function update($id,Requests\Admin\AdminCourseEditRequest $request)
	{
		$this->courseRepository->update($id,$request->all());
        return redirect()->action('Admin\CourseController@index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $this->courseRepository->destroy($id);
        return redirect()->action('Admin\CourseController@index');
	}

}
