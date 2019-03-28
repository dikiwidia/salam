<?php

namespace App\Http\Middleware\Salam;

use Closure;

class RedirectIfNoSession
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
        if (!$request->session()->has('masuk')) {
            // user value cannot be found in session
            return redirect('/login');
        }
        return $next($request);
    }
}
