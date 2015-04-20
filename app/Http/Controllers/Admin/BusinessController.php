<?php namespace App\Http\Controllers\Admin;

use App\Business;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\BusinessRepositoryInterface as BusinessRepositoryInterface;

use Illuminate\Http\Request;

class BusinessController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @param BusinessRepositoryInterface $businessRepository
     */

    public function __construct(BusinessRepositoryInterface $businessRepository){

        $this->businessRepository = $businessRepository;
    }

	public function index()
	{
        $businesses =$this->businessRepository->all();
        $pageTitle = "Business Manager";
        return view('administrator.businesses.index',compact('businesses','pageTitle'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $pageTitle = "Create New Business";
        return view('administrator.businesses.create',compact('pageTitle'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\BusinessRequest $request
     * @return Response
     */
	public function store(Requests\BusinessRequest $request)
	{
        $this->businessRepository->store($request->all());
        return redirect()->action('Admin\BusinessController@index');

    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $business =$this->businessRepository->find($id);
        $pageTitle = $business->name;
        return view('administrator.businesses.show',compact('business','pageTitle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $business =$this->businessRepository->find($id);
        $pageTitle = "Edit ".$business->name;
        return view('administrator.businesses.edit',compact('business','pageTitle'));
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
        $this->businessRepository->update($id,$request->all());
        return redirect()->action('Admin\BusinessController@index');

    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $this->businessRepository->destroy($id);
        return redirect()->action('Admin\BusinessController@index');
	}

}
