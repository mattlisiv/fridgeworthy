<?php namespace App\Http\Controllers\Admin;

use App\District;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Region;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\RegionRepositoryInterface as RegionRepositoryInterface;
use App\Repositories\Interfaces\DistrictRepositoryInterface as DistrictRepositoryInterface;
use Illuminate\Support\Facades\App;

class RegionController extends Controller {




    public function __construct(RegionRepositoryInterface $regionRepositoryInterface,DistrictRepositoryInterface $districtRepositoryInterface){

        $this->regionRepository = $regionRepositoryInterface;
        $this->districtRepository = $districtRepositoryInterface;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
    {
        $regions = $this->regionRepository->all();
        $pageTitle = "Region Manager";
        return view('administrator.regions.index',compact('regions','pageTitle'));

    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $pageTitle = "Create New Region";
        $districts = $this->districtRepository->all();
        return view('administrator.regions.create',compact('pageTitle','districts'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\RegionRequest $request
     * @return Response
     */
	public function store(Requests\RegionRequest $request)
	{
        $this->regionRepository->store($request->all());
        return redirect()->action('Admin\RegionController@index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

        $region = $this->regionRepository->find($id);
        $pageTitle = $region->name;
        return view('administrator.regions.show',compact('region','pageTitle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $region = $this->regionRepository->find($id);
        $districts = $this->districtRepository->all();
        $pageTitle = "Edit ".$region->name;
        return view('administrator.regions.edit',compact('region','pageTitle','districts'));
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
        $this->regionRepository->update($id,$request->all());
        return redirect()->action('Admin\RegionController@index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $this->regionRepository->destroy($id);
        return redirect()->action('Admin\RegionController@index');
	}

}
