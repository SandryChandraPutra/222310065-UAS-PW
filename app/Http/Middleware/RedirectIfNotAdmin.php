<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfNotAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->guard('admin')->check()) {
            return redirect('/loginAdmin')->with('error', 'Anda harus login sebagai admin.');
        }

        return $next($request);
    }
}
