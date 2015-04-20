<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Region;
use App\School;
use Illuminate\Http\Request;

class SchoolController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $schools = School::all();
        $pageTitle = "School Manager";
        return view('schools.index',compact('schools','pageTitle'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $pageTitle = "Create New School";
        $regions = Region::all();
        return view('schools.create',compact('pageTitle','regions'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\SchoolRequest $request
     * @return Response
     */
	public function store(Requests\SchoolRequest $request)
	{
        School::create($request->all());
        return redirect('admin/schools');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

        $school = School::findOrFail($id);
        $pageTitle = $school->name;
        return view('schools.show',compact('school','pageTitle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $school = School::findOrFail($id);
        $pageTitle = "Edit ".$school->name;
        $regions = Region::all();
        return view('schools.edit',compact('school','pageTitle','regions'));
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
        $school = School::findOrFail($id);
        $school->update($request->all());

        return redirect('admin/schools');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $school = School::findOrFail($id);
        $school->delete();
        return redirect('admin/schools');
	}

}
