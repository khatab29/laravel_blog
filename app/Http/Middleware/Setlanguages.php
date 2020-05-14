<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;

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
        
             App::setlocale($request->lang);
        
              return $next($request);
    }




    /*
        public function handle($request, Closure $next)
        {
            if ($request->method() === 'GET') {
                $segment = $request->segment(1);

                if (!in_array($segment, config('app.locales'))) {
                    $segments = $request->segments();
                    $fallback = $request->cookie('lang')?: config('app.fallback_locale');
                    $segments = Arr::prepend($segments, $fallback);

                    return redirect()->to(implode('/', $segments));
                }

                $cookie=cookie()->forever('lang', $segment );
                app()->setLocale($segment);
            }

            return $next($request)->cookie($cookie);
        }*/
}
