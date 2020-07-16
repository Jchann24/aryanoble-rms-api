<?php

namespace App\Http\Middleware\Custom;

use Closure;

class Candidate
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
        if ($request->user()->group->id == 5) {
            return $next($request);
        } else {
            return response(['error' => 'Forbidden request, only Candidate'], 403);
        }
    }
}
