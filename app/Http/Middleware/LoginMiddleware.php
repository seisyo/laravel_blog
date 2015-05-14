<?php namespace App\Http\Middleware;

use Closure;
use Session;

class LoginMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(Session::get('check') === true){
			return $next($request);
		}
		else{
			Session::flash('msg', '請登入');
			return redirect('/login');
		}
	}

}
