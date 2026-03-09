<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                $user = Auth::user();

                switch ($user->role) {
                    case 'admin':
                        return redirect()->route('admin.dashboard');
                    case 'guru':
                        return redirect()->route('guru.dashboard');
                    case 'siswa':
                        return redirect()->route('siswa.dashboard');
                    default:
                        Auth::logout();
                        return redirect()->route('login');
                }
            }
        }

        return $next($request);
    }
}