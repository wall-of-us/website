<?php

namespace App\Http\Middleware;

use Closure;

class ForceSSL
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
        /* we are behind a load balancer, so use it's proto, allow health requests to come through unmolested */
        if(($request->header('x-forwarded-proto') <> 'https') and ('/health' <> $request->getRequestUri())){
            return redirect()->secure($request->getRequestUri());
        }
        return $next($request);
    }
}
