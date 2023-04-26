<?php

namespace App\Http\Middleware;

use App\Http\Controllers\AlertController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthCheckAdmin
{
    use AlertController;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() or Auth::check() and !Auth::user()->is_admin){
            $this->__alert__('warning', 'No tiene permisos para acceder a esta página');
            abort(403);
        }
        return $next($request);
    }
}
