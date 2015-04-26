<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Interfaces\CourseRepositoryInterface;
use App\UploadedCourseFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CourseFilesController extends Controller {



    public function __construct(CourseRepositoryInterface $courseRepositoryInterface)
    {

        $this->courseRepository = $courseRepositoryInterface;

    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
     * @param Requests\Admin\AdminFileUploadRequest $request
     * @return Response
     */
	public function store(Requests\Admin\AdminFileUploadRequest $request)
	{

        $course = $this->courseRepository->find($request['course_id']);

        if($request->hasFile('coursefile')){

            $disk = Storage::disk('local');
            $file_name = 'course-'.$course->id.".".$request->file('coursefile')->getClientOriginalExtension();
            $destination = 'uploads/coursefiles';
            $request->file('coursefile')->move($destination,$file_name);
            $upload = UploadedCourseFile::create(['filename'=>$request['filename'],'course_id'=>$request['course_id'],'file_path'=>$destination.'/'.$file_name]);

        }
        return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
