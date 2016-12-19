<?php

namespace App\Http\Middleware;

use Closure;

class ShopkeeperMiddleware
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
        if($role != 'shopkeeper' && $role != 'admin')
        {
            return redirect('/');
        }
        return $next($request);
    }
}
