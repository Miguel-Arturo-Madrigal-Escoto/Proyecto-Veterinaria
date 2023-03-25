<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthCheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() or Auth::check() and !Auth::user()->is_admin){
            notyf()
                ->position('x', 'center')
                ->position('y', 'top')
                ->addInfo('No tiene permisos para acceder a esta página');
            abort(403);
        }
        return $next($request);
    }
}
