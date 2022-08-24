<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class RedirectIfAuthenticated
 * Слой для группы guest
 * Назначается в /app/Http/Kernel.php
 * @package App\Http\Middleware
 */
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // Редирект если авторизован, в случая попытки попасть на router назначенный для guest в /routes/web.php
            // return redirect(RouteServiceProvider::HOME);
            return redirect()->home();
        }

        return $next($request);
    }
}
