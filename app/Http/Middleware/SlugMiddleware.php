<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class SlugMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        $newRequestData=$request->all();
        $requestData=$request->all();

        foreach (config('app.languages') as $land){
            if(isset($requestData[$land]) && isset($requestData[$land]['slug'])){
                $newRequestData[$land]['slug']=Str::slug($requestData[$land]['slug']);
            }
        }
        $request->replace($newRequestData);
        return $next($request);
    }
}
