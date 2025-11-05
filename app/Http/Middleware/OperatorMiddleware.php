<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OperatorMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role === 'operator') {
            return $next($request);
        }

        return response()->json(['error' => 'Akses ditolak. Hanya operator yang dapat mengakses.'], 403);
    }
}
