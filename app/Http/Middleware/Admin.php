<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if (!auth()->guard('admin')->check())
        {
            return redirect('admin/login');
        }
        elseif (auth()->guard('admin')->check())
        {
            if(auth()->guard('admin')->user()->is_active !== 1)
            {
                auth()->guard('admin')->logout();
                return redirect('admin/login');
            }

            if(auth()->guard('admin')->user()->is_verified !== 1)
            {
                auth()->guard('admin')->logout();
                return redirect(route('send-verification-admin'));
            }
        }

        return $next($request);
    }
}
