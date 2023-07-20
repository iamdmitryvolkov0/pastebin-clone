<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CheckBanStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response|RedirectResponse)  $next
     ** @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next): RedirectResponse|Response
    {
        if (Auth::check() && Auth::user()->is_banned) {
            return response()->redirectTo(route('banned'));
        }

        return $next($request);
    }
}
