<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class IsRoleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check() or ($request->user()->role!=2 and $request->user()->role!=1 ) ) {
          //  return redirect()->guest('login');
            return redirect()->to('role-error');
           //  return response('Unauthorized.', 401);
        }
        return $next($request);
       
    }
}
