<?php

namespace App\Http\Middleware;

use App\Enums\Guards;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->guard(Guards::USER->value)->check()){
            return redirect()->route('front-login-view');
        }
        return $next($request);
    }
}
