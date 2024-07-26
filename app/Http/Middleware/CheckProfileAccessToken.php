<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckProfileAccessToken
{
    public function handle(Request $request, Closure $next)
    {
        $token = session('auth_token');

        if (!$token) {
            return redirect()->route('login')->withErrors(['token' => 'Token tidak ditemukan atau tidak valid']);
        }

        if (!Auth::guard('sanctum')->check()) {
            return redirect()->route('login')->withErrors(['auth' => 'Autentikasi gagal']);
        }

        return $next($request);
    }
}
