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
        //$lang = array('','en', 'ar' );
        //if (in_array($request->lang, $lang)) {
            \App::setlocale($request->lang);
        //}else{
            //return redirect('admin.404');
       // }
        
        return $next($request);
    }
}
