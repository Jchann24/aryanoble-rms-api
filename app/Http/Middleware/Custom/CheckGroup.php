<?php

namespace App\Http\Middleware\Custom;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckGroup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$groups)
    {

        $groupIds = ['super-user' => 1, 'admin' => 2, 'pic' => 3, 'div-user' => 4, 'candidate' => 5];
        $allowedGroupIds = [];
        foreach ($groups as $group) {
            if (isset($groupIds[$group])) {
                $allowedGroupIds[] = $groupIds[$group];
            }
        }
        $allowedGroupIds = array_unique($allowedGroupIds);

        if (Auth::check()) {
            if (in_array(Auth::user()->group_id, $allowedGroupIds)) {
                return $next($request);
            }
            return response()->json(['error' => 'Forbidden request.'], 403);
        } else {
            return response()->json(['error' => 'Forbidden request.'], 403);
        }
    }
}
