<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (!$request->user()) {
            return redirect('/login')->with('error', 'Please login to continue.');
        }

        if (!in_array($request->user()->role, $roles)) {
            abort(403, 'Unauthorized action. You need ' . implode(' or ', $roles) . ' role.');
        }

        return $next($request);
    }
}
