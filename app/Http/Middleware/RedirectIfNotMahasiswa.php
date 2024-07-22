<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfNotMahasiswa
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->guard('mahasiswa')->check()) {
            return redirect('/')->with('error', 'Anda harus login sebagai mahasiswa.');
        }

        return $next($request);
    }
}
