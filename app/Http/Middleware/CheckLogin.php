<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->session()->has('user')){
            return redirect()->route('login')->with('error', 'Maaf anda tidak memiliki akses!');
        }
        $s=session('user');
        $user=Member::where('email', $s->email)->first();
        if($user){
            if($user->role === 'admin'){
                return $next($request);
            }
            else if($user->role === 'fitnes'){
                return $next($request);
            }
            return redirect('login')->with('error', 'Maaf ada kesalahan saat mesukinkan email dan password akun anda');
        }
    }
}
