<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->is_admin == false) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
