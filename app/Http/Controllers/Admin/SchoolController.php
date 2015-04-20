<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\SchoolRepositoryInterface as SchoolRepositoryInterface;
use App\Repositories\Interfaces\RegionRepositoryInterface as RegionRepositoryInterface;
use App\Region;
use App\School;
use Illuminate\Http\Request;

class SchoolController extends Controller {


    public function __construct(SchoolRepositoryInterface $schoolRepositoryInterface,RegionRepositoryInterface $regionRepositoryInterface){

        $this->schoolRepository = $schoolRepositoryInterface;
        $this->regionRepository = $regionRepositoryInterface;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $schools = $this->schoolRepository->all();
        $pageTitle = "School Manager";
        return view('administrator.schools.index',compact('schools','pageTitle'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $pageTitle = "Create New School";
        $regions = $this->regionRepository->all();
        return view('administrator.schools.create',compact('pageTitle','regions'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\SchoolRequest $request
     * @return Response
     */
	public function store(Requests\SchoolRequest $request)
	{
        $this->schoolRepository->store($request->all());
        return redirect()->action('Admin\SchoolController@index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

        $school = $this->schoolRepository->find($id);
        $pageTitle = $school->name;
        return view('administrator.schools.show',compact('school','pageTitle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $school = $this->schoolRepository->find($id);
        $regions = $this->regionRepository->all();
        $pageTitle = "Edit ".$school->name;
        return view('administrator.schools.edit',compact('school','pageTitle','regions'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Requests\SchoolRequest $request
     * @return Response
     */
	public function update($id,Requests\SchoolRequest $request)
	{
        $this->schoolRepository->update($id,$request->all());
        return redirect()->action('Admin\SchoolController@index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $this->schoolRepository->destroy($id);
        return redirect()->action('Admin\SchoolController@index');
	}

}
