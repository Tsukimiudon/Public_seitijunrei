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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
    //最初の管理人だけが見れるようにする
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && $request->user()->isAdmin()) {
            return $next($request);
        }

        return abort(403, 'Unauthorized');
    }
}