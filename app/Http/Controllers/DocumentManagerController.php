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
	public function index()
	{
		$user = Auth::user();


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
		var_dump($request->all());
        $fd = fopen($request->file('study_file')->getRealPath(), "rb");
        var_dump($fd);

        $filename = $request->file('study_file')->getFilename();
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
        $id = $uploadedFile->save();






        $link = Dropbox::createShareableLink($uploadedFile->file_path);

        header("Location:".$link);

        return;

        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/download/Frog.".$request->file('study_file')->getClientOriginalExtension();
        $fd = fopen($file, "wb") or die("Unable to open file");
        $metadata = Dropbox::getFile("/Frog.".$request->file('study_file')->getClientOriginalExtension(), $fd);
        fclose($fd);

        if(File::isFile($file)) {
            ob_end_clean();
            return response()->download($file);
            unlink($file);

        }else{
            return "No file available";
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
