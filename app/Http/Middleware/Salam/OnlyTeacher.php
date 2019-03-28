<?php

namespace App\Http\Middleware\Salam;

use Closure;

class OnlyTeacher
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
        if ($request->session()->get('role') == 'G') {
            return $next($request);
        } else {
            return redirect('/')->with('warning','Anda bukan Administrator');
        }
    }
}
