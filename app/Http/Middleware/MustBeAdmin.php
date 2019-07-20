<?php

namespace App\Http\Middleware;

use Closure;
use crocodicstudio\crudbooster\helpers\CRUDBooster;

class MustBeAdmin
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

        if (CRUDBooster::myPrivilegeId() != 1) {
           
            return redirect('/error');
        }
        return $next($request);

    }
}
