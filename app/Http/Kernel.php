<?php
namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{


    protected $routeMiddleware = [
        // Middleware lainnya...
        'check_profile_access_token' => \App\Http\Middleware\CheckProfileAccessToken::class,
        'cekAkun'=> \App\Http\Middleware\CheckLogin::class,
        'activity' => \App\Http\Middleware\Activty::class
    ];
}