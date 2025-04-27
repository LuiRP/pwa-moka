<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    public function handle(Request $request, Closure $next, $requiredPermission): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $userPermission = auth()->user()->permiso;

        if ($userPermission == 0) {
            return $next($request);
        }

        if ($userPermission != $requiredPermission) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}