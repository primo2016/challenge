<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(Auth::user()->hasRoles([$role])) {
            return $next($request);
        }

        return abort(403,'Acceso denegado');

    }
}
