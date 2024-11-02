<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ensure the user is authenticated
        if (Auth::check()) {
            // Get the token from the tokens table for the authenticated user
            $token = DB::table('tokens')
                ->where('user_id', Auth::id())
                ->value('token_id');

            // Check if the token matches 'lokesh'
            if ($token === 'lokesh') {
                // if ($request->user()->hasRole($role)) {
                    return $next($request);
                // }
            }
        }

        // If the token doesn't match or the user is not authenticated, abort with 401 Unauthorized
        abort(401, 'Unauthorized');
    }
}
