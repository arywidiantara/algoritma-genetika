<?php namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() == null)
        {
            return redirect()->route('admin.login')->with('danger', 'Anda Belum Login');
        }
        return $next($request);
    }
}
