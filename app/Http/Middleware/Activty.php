<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Member;
class Activty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $s=session('user');
        $user=Member::where('email', $s->email)->first();
        if(!$user){
            return redirect()->route('login')->with('error', 'Maaf anda tidak memiliki akses!');
        }else if($user->role === 'admin'){
            return $next($request);
        }else {
            return redirect()->route('login')->with('error', 'Maaf anda tidak memiliki akses!');
        }

    }
}
