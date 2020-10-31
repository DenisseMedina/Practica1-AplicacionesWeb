<?php

namespace App\Http\Middleware;

use Closure;

class VerificarUsuario
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
        if ($request->user()->tokenCan('Administrador')) {
            return abort(403,'No Permitido');
        }
        return $next($request);
    }
}
