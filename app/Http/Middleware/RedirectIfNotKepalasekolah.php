<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotKepalasekolah
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'kepalasekolah')
	{
	    if (!Auth::guard($guard)->check()) {
	        return redirect('kepalasekolah/login');
	    }

	    return $next($request);
	}
}