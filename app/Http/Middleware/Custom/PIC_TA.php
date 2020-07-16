<?php

namespace App\Http\Middleware\Custom;

use Closure;

class PIC_TA
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
        if ($request->user()->group->id == 3) {
            return $next($request);
        } else {
            return response(['error' => 'Forbidden request, only PIC TA'], 403);
        }
    }
}
