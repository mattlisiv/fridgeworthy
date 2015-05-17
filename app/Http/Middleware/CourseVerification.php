<?php namespace App\Http\Middleware;

use App\Repositories\Interfaces\CourseRepositoryInterface;
use App\Repositories\CourseRepository;

use Closure;
use Illuminate\Support\Facades\Auth;

class CourseVerification {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

        $courseRepository = new CourseRepository();
        $course_id = $request->route()->parameters('id')['id'];
        $course = $courseRepository->find($course_id);
        $user = Auth::user();

        if(get_class($user)=='App\Teacher' && $course->isTeacher($user))
        {
            return $next($request);
        }else if(get_class($user) == 'App\Student' && $user->enrolledInCourse($course)) {
            return $next($request);
        }
            else{
                return 'Could not be authorized';
            }

	}

}
