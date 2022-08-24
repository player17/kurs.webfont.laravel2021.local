<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class AdminMiddleware
 * Слой для управления правом доступа в админку
 * Регистрация слоя в /app/Http/Kernel.php
 * Маршруты заключить в группы /routes/web.php
 * @package App\Http\Middleware
 */
class AdminMiddleware
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
        if(Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }
        // Если не прервать - будет фатальная ошибка для тех у кого нет доступа
        abort(404);
    }
}
