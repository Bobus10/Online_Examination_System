<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnums;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserRoleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()) {
            if(Auth::user()->role == (UserRoleEnums::ADMIN)->value) {
                return $next($request);
            } else {
                return redirect('/home')->with('message', 'Access Denied. You are not a administrator');
            }
        } else {
            return redirect('/login')->with('message', 'You need to be logged in to access this page');;
        }
    }
}
