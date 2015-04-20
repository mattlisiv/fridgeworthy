<?php namespace App\Http\Controllers;

use App\Business;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BusinessController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $businesses = Business::all();
        $pageTitle = "Business Manager";
        return view('businesses.index',compact('businesses','pageTitle'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $pageTitle = "Create New Business";
        return view('businesses.create',compact('pageTitle'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\BusinessRequest $request
     * @return Response
     */
	public function store(Requests\BusinessRequest $request)
	{
        Business::create($request->all());
        return redirect('admin/businesses');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $business = Business::findOrFail($id);
        $pageTitle = $business->name;
        return view('businesses.show',compact('business','pageTitle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $business = Business::findOrFail($id);
        $pageTitle = "Edit ".$business->name;
        return view('businesses.edit',compact('business','pageTitle'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Requests\BusinessRequest $request
     * @return Response
     */
	public function update($id,Requests\BusinessRequest $request)
	{
        $business = Business::findOrFail($id);
        $business->update($request->all());

        return redirect('admin/businesses');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $business = Business::findOrFail($id);
        $business->delete();
        return redirect('admin/businesses');
	}

}
