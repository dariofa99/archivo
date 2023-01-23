<?php

namespace App\Http\Middleware;

use Closure;

class VerifyAccessToFile
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
        if(!$request->ajax()){
            if(($request->carpeta == '3' and \Auth::user()->can('ver_historico')) || ($request->carpeta == '2' and \Auth::user()->can('ver_central')) || ($request->carpeta == '1' and \Auth::user()->can('ver_gestion'))){
                return $next($request);
            }
            abort(403);
        }
        return $next($request);
        
      
        
    }
}
