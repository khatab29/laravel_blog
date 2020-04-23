<?php

namespace App\Http\Middleware;

use Closure;

class Setlanguages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        \App::setlocale($request->lang);
        return $next($request);
    }
}
