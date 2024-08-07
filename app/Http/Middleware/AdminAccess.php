<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if ($user && $user->id === 1) {
            return $next($request);
        }

        return redirect()->route('dashboard')->with('error', 'You do not have access to the admin panel.');
    }
}
