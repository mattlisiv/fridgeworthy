<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\District;
use App\Http\Requests\DistrictRequest;
use Illuminate\Support\Facades\Session;


class DistrictController extends Controller {

	public function index(){


        $districts = District::all();
        $pageTitle = "District Manager";

        return view('districts.index', compact('districts','pageTitle'));
    }

    public function show($id){

        $district = District::findOrFail($id);
        $pageTitle = $district->name;
        return view('districts.show',compact('district','pageTitle'));
    }

    public function create(){

        $pageTitle = "Create New District";
        return view('districts.create',compact('pageTitle'));
    }

    public function store(DistrictRequest $request){


        District::create($request->all());
        Session::flash('flash_message','District has been created');
        return redirect('admin/districts');

    }

    public function edit($id){


        $district = District::findOrFail($id);
        $pageTitle = "Edit ".$district->name;
        return view('districts.edit',compact('district','pageTitle'));

    }

    public function update($id,DistrictRequest $request){

        $district = District::findOrFail($id);
        $district->update($request->all());

        return redirect('admin/districts');
    }

    public function destroy($id){
        $district = District::findOrFail($id);
        $district->delete();
        return redirect('admin/districts');

    }

}
