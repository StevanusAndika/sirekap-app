<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KaprodiMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && in_array(auth()->user()->role, ['kaprodi', 'admin'])) {
            return $next($request);
        }

        return response()->json(['error' => 'Akses ditolak. Hanya kaprodi atau admin yang dapat mengakses.'], 403);
    }
}
