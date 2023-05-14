<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $langPrefix = ltrim($request->route()->getPrefix(), '/');
        if ($langPrefix){
            \App::setLocale($langPrefix);
        }

        return $next($request);
    }
}
