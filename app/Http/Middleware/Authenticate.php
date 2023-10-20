<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            if ($request->routeIs("admin.*")) {

                return route('admin.login');
            } elseif ($request->routeIs('stagiaire.*')) {

                dd('ff');
                return route('login');
            } else
                abort(403);
        }
        return route('login');
    }
}
