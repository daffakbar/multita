<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotTimketertiban
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'timketertiban')
	{
	    if (!Auth::guard($guard)->check()) {
	        return redirect('timketertiban/login');
	    }

	    return $next($request);
	}
}