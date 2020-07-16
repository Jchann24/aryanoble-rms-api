<?php

namespace App\Http\Middleware\Custom;

use Closure;

class Admin_TA
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
        if ($request->user()->group->id == 2) {
            return $next($request);
        } else {
            return response(['error' => 'Forbidden request, only Admin TA'], 403);
        }
    }
}
