<?php namespace App\Http\Controllers;

use App\District;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Region;
use Illuminate\Http\Request;

class RegionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
    {
        $regions = Region::all();
        $pageTitle = "Region Manager";
        return view('regions.index',compact('regions','pageTitle'));

    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $pageTitle = "Create New Region";
        $districts = District::all();
        return view('regions.create',compact('pageTitle','districts'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\RegionRequest $request
     * @return Response
     */
	public function store(Requests\RegionRequest $request)
	{

        Region::create($request->all());
        return redirect('admin/regions');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

        $region = Region::findOrFail($id);
        $pageTitle = $region->name;
        return view('regions.show',compact('region','pageTitle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $region = Region::findOrFail($id);
        $pageTitle = "Edit ".$region->name;
        $districts = District::all();
        return view('regions.edit',compact('region','pageTitle','districts'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Requests\RegionRequest $request
     * @return Response
     */
	public function update($id,Requests\RegionRequest $request)
	{
        $region = Region::findOrFail($id);
        $region->update($request->all());

        return redirect('admin/regions');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $region = Region::findOrFail($id);
        $region->delete();
        return redirect('admin/regions');
	}

}
