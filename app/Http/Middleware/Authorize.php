<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class Authorize {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{




        $users_allowed = $this->getUserType($request);
        $user = Auth::user();

        if(is_null($user)){

            return redirect()->action('HomeController@index');
        }

        $user_type = get_class($user);

        if(in_array($user_type,$users_allowed)){
            return $next($request);

                }else{

                        switch(get_class($user)){

                            case 'App\Teacher':
                            case 'App\Student':
                                return redirect()->action('HomeController@index');
                                break;
                            case 'App\BusinessManager':
                                return redirect()->action('Business\HomeController@index');
                                break;
                            case 'App\Guardian':
                                return redirect()->action('Mentor\HomeController@index');
                                break;
                            case 'App\Admin':
                                return redirect()->action('Admin\AdministratorController@index');
                                break;
                            default:
                                return redirect()->action('HomeController@index');
                        }


                }





	}

    private function getUserType($request)
    {
        $actions = $request->route()->getAction();

        return $actions['user_type'];
    }


}
