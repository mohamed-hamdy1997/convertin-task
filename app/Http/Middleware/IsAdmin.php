<?php

namespace App\Http\Middleware;

use App\Enums\AUserType;
use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() &&  auth()->user()->type == AUserType::ADMIN) {
            return $next($request);
        }

        return redirect()->back()->with('error', "You don't have access");
    }
}