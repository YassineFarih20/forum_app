<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;


class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if ($request->routeIs("admin.*")) {
            return Auth::check() && Auth::user()->hasRole($role) ? $next($request) : abort(403);
        } elseif ($request->routeIs('stagiaire.*')) {
            return Auth::guard('stagiaire')->check() && Auth::guard('stagiaire')->user()->hasRole($role) ? $next($request) : abort(403);
        } else
            abort(403);
    }
}
