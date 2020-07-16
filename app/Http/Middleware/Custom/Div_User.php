<?php

namespace App\Http\Middleware\Custom;

use Closure;

class Div_User
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
        if ($request->user()->group->id == 4) {
            return $next($request);
        } else {
            return response(['error' => 'Forbidden request, only User'], 403);
        }
    }
}
