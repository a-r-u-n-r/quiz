<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (auth()->check() && auth()->user()->role === $role) {
            return $next($request);
        }

        // If the user is not an admin, redirect them
        return redirect('/');
    }
}
