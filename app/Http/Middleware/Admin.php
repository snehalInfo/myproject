<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 'SuperAdmin') {

            if (!$request->is('superadmin/dashboard')) {
           		return redirect('superadmin/dashboard');
        	}
        }

        if (Auth::check() && Auth::user()->role == 'Admin') {

            if (!$request->is('admin/dashboard')) {
           		return redirect('admin/dashboard');
        	}
        }

        return $next($request);
    }
}
