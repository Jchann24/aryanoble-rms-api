<?php

namespace App\Http\Middleware\Custom;

use Closure;

class SuperUser
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
        if ($request->user()->group->id == 1) {
            return $next($request);
        } else {
            return response(['error' => 'Forbidden request, only Super User'], 403);
        }
    }
}
