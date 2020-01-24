<?php

namespace App\Http\Middleware;

use Closure;

class CheckId
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

        if ($request->id >10){
            return response('Chi Cho Phep Tu 1 Den 10');
        }
        else {
            return $next($request);
        }

    }
}
