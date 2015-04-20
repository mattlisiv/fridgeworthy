<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\District;
use App\Http\Requests\DistrictRequest;
use App\Repositories\Interfaces\DistrictRepositoryInterface as DistrictRepositoryInterface;


class DistrictController extends Controller {

    public function __construct(DistrictRepositoryInterface $districtRepository){

            $this->districtRepository = $districtRepository;
    }

	public function index(){

        $districts = $this->districtRepository->all();
        $pageTitle = "District Manager";

        return view('administrator.districts.index', compact('districts','pageTitle'));
    }

    public function show($id){

        $district = $this->districtRepository->findWithRegion($id);
        $pageTitle = $district->name;
        return view('administrator.districts.show',compact('district','pageTitle'));
    }

    public function create(){

        $pageTitle = "Create New District";
        return view('administrator.districts.create',compact('pageTitle'));
    }

    public function store(DistrictRequest $request){

        $this->districtRepository->store($request->all());
        return redirect()->action('DistrictController@index');

    }

    public function edit($id){

        $district = $this->districtRepository->find($id);
        $pageTitle = "Edit ".$district->name;
        return view('administrator.districts.edit',compact('district','pageTitle'));

    }

    public function update($id,DistrictRequest $request){

        $this->districtRepository->update($id,$request->all());
        return redirect()->action('Admin\DistrictController@index');
    }

    public function destroy($id){

        $this->districtRepository->destroy($id);
        return redirect()->action('Admin\DistrictController@index');

    }

}
