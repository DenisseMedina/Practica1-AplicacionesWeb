<?php

namespace App\Http\Middleware;

use Closure;

class PermisosAdmin
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
        if ($request->rol== 2) {
            return abort(401,'No Permitido, no eres administrador');
        }
        return $next($request);
    }
}
