<?php

namespace App\Http\Middleware\Salam;

use Closure;
use App\Salam\Pengguna;
use App\Salam\Admin;

class ModulSantri
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
        if ($request->session()->get('role') == 'A') {
            if($request->session()->get('mod_santri') == 'Y'){
                return $next($request);
            } else {
                return redirect('/')->with('warning','Anda tidak diizinkan mengakses modul ini');
            }
        } else {
            return redirect('/')->with('warning','Anda bukan Administrator');
        }
    }
}
