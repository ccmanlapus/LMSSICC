<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Get the authenticated user
        $user = $request->user();

        // Check if the user is authenticated and their role matches one of the allowed roles
        if (!$user || !in_array($user->role, $roles)) {
            // Abort with 403 Forbidden if the user doesn't have the required role
            abort(403, 'Unauthorized Access');
        }

        // Allow the request to proceed if the role is valid
        return $next($request);
    }
}
