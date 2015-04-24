<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CourseRepositoryInterface as CourseRepositoryInterface;
use Illuminate\Http\Request;

class CourseController extends Controller {


    public function __construct( CourseRepositoryInterface $courseRepositoryInterface){

        $this->courseRepository = $courseRepositoryInterface;

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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
