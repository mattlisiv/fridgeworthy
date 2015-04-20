<?php namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Business;
use App\BusinessManager;
use App\Guardian;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Role;
use App\School;
use App\Student;
use App\Teacher;
use App\User;
use Faker\Factory;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepositoryInterface;
use App\Repositories\Interfaces\RoleRepositoryInterface as RoleRepositoryInterface;
use App\Repositories\Interfaces\SchoolRepositoryInterface as SchoolRepositoryInterface;
use App\Repositories\Interfaces\BusinessRepositoryInterface as BusinessRepositoryInterface;

class UserController extends Controller {

    public function __construct(UserRepositoryInterface $userRepositoryInterface,RoleRepositoryInterface $roleRepositoryInterface,
                                SchoolRepositoryInterface $schoolRepositoryInterface,BusinessRepositoryInterface $businessRepositoryInterface){

        $this->userRepository = $userRepositoryInterface;
        $this->roleRepository = $roleRepositoryInterface;
        $this->schoolRepository = $schoolRepositoryInterface;
        $this->businessRepository = $businessRepositoryInterface;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $pageTitle = "Manage Users";
        $users = $this->userRepository->all();
		return view('administrator.users.index',compact('pageTitle','users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$pageTitle = "Create User";
        $roles = $this->roleRepository->all();
        $schools = $this->schoolRepository->all();
        $businesses = $this->businessRepository->all();
        return view('administrator.users.create',compact('pageTitle','roles','schools','businesses'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\UserRequest $request
     * @return Response
     */
	public function store(Requests\UserRequest $request)
	{
		$input = $request->all();
        $this->userRepository->store($request->all());


        return redirect()->action('Admin\UserController@index');

    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

        $user = $this->userRepository->find($id);
        $pageTitle = "User Details";

        return view('administrator.users.show',compact('user','pageTitle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $user = $this->userRepository->find($id);
        $pageTitle = "Edit ".$user->first_name.' '.$user->last_name.' Information';
        $roles = $this->roleRepository->all();
        $schools = $this->schoolRepository->all();
        $businesses = $this->businessRepository->all();
        return view('administrator.users.edit',compact('roles','businesses','schools','pageTitle','user'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Requests\AdminUserEditRequest $request
     * @return Response
     */
	public function update($id,Requests\AdminUserEditRequest $request)
	{
        $user = $this->userRepository->find($id);
        $input = $request->all();
        $this->userRepository->update($id,$request->all());

        return redirect()->action('Admin\UserController@index');

    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $this->userRepository->destroy($id);
        return redirect()->action('Admin\UserController@index');
	}

}
