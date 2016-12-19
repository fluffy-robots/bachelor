<?php

namespace App\Http\Middleware;

use Closure;

class ManufacturerMiddleware
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
        $user = $request->user();
        $role = $user->role;
        if($role != 'manufacturer' && $role != 'admin')
        {
            return redirect('/');
        }
        return $next($request);
    }
}
