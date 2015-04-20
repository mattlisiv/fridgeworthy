<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $user = Auth::user();
        echo is_a($user,'App\Admin');
        if(is_a($user,'App\Admin',true)){

            return $next($request);

        }else{

            return redirect()->action('HomeController@index');
        }



	}

}
