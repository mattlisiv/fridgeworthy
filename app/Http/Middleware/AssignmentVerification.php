<?php namespace App\Http\Middleware;

use App\Repositories\AssignmentRepository;
use Closure;
use Illuminate\Support\Facades\Auth;

class AssignmentVerification {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

        $assignmentRepository = new AssignmentRepository();
        $assignment_id = $request->route()->parameters('id')['id'];
        $assignment = $assignmentRepository->find($assignment_id);
        $course = $assignment->course;
        $user = Auth::user();
        if(get_class($user)=='App\Teacher' && $course->isTeacher($user))
        {
            return $next($request);
        }else if(get_class($user) == 'App\Student' && $user->enrolledInCourse($course)) {
            return $next($request);
        }else if(get_class($user) == 'App\Guardian' && $user->hasStudentInCourse($course)){
            return $next($request);
        }
        else{
            return 'Could not be authorized';
        }

	}

}
