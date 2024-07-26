<?php

namespace App\Http\Middleware;

use App\Models\Member;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = session('user');
        $fitnes = Member::find($user->id);
        if ($fitnes) {
            if($fitnes->role ==="fitnes"){
                return $next($request);
            }

            return redirect()->route('dashboard')->with('error', 'Maaf anda tidak memiliki akses!');
        }                                                             
    }
}
