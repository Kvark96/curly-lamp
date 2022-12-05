<?php

namespace App\Http\Middleware;

use Closure;

class VerifyRole
{
    /**
     * Handle an incoming request determined by their role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->type_id === 3) {
            return redirect('/projects');
        }

        return $next($request);
    }
}
