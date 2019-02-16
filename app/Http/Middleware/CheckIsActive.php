<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class CheckIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user()->status == User::USER_BLOCKED) {
            return redirect('login')->with('status', 'User blocked');
            exit();
        }
        return $next($request);
    }
}
