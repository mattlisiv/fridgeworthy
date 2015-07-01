<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\CourseRepository;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use App\UploadedCourseFile;
use GrahamCampbell\Dropbox\Facades\Dropbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentManagerController extends Controller {


    public function __construct(CourseRepositoryInterface $courseRepositoryInterface){

        $this->courseRepository = $courseRepositoryInterface;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{

        $course = $this->courseRepository->find($id);
        $files = $course->uploadedFiles()->get();
		$user = Auth::user();

        return view('teacher.documents.index',compact('course','files','user'));



	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$user = Auth::user();
        $course = $this->courseRepository->find($id);
        return view('teacher.documents.create',compact('user','course'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\DocumentStorageRequest $request)
	{

        try{
            var_dump($request->all());
            $fd = fopen($request->file('study_file')->getRealPath(), "rb");
            var_dump($fd);

            $filename = $request['name'];
            $returned = Dropbox::searchFileNames('/', $request['name'], 1, false);
            if(count($returned)>0){
                $temp = $filename;
                $i = 0;
                while(count($returned>0)){
                    $temp = $filename.$i;
                    $returned = Dropbox::searchFileNames('/', $temp, 1, false);
                    $i++;
                    $temp = $filename;
                }
                $filename = $temp;
            }

            $md1 = Dropbox::uploadFile("/".$filename.".".$request->file('study_file')->getClientOriginalExtension(), \Dropbox\WriteMode::add(), $fd);
            fclose($fd);
            print_r($md1);

            $uploadedFile = new UploadedCourseFile();
            $uploadedFile->course_id = $request['course_id'];
            $uploadedFile->file_path = "/".$filename.".".$request->file('study_file')->getClientOriginalExtension();
            $uploadedFile->filename = $request['name'];
            $uploadedFile->save();

            return redirect()->action('DocumentManagerController@show',$uploadedFile->id);

        }catch(\Exception $exception){

            $message = "Sorry, there was an error saving this file. The error has been reported. If the problem persists, please email support@fridge-worthy.com for help.";

            return $exception;

        }

    }



	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $file = UploadedCourseFile::findOrFail($id);
        $link = Dropbox::createShareableLink($file->file_path);
        $message = $file->filename;
        $user = Auth::user();
        return view('teacher.documents.show',compact('link','message','user','file'));


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

		$user = Auth::user();
        $file = UploadedCourseFile::findOrFail($id);

        $course_id = $file->course_id;
        $receipt = Dropbox::delete($file->file_path);
        $file->delete();
        return redirect()->action('DocumentManagerController@index',$course_id);

	}

    public function delete($id){

       $user = Auth::user();
        $file = UploadedCourseFile::findOrFail($id);
        return view('teacher.documents.delete',compact('user','file'));
    }

}
