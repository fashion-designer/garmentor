<?php

namespace App\Http\Middleware;

use Closure;

class Designer
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
        if (!auth()->guard('designer')->check())
        {
            return redirect('designer/login');
        }
        elseif (auth()->guard('designer')->check())
        {
            if(auth()->guard('designer')->user()->is_active !== 1)
            {
                auth()->guard('designer')->logout();
                return redirect('designer/login');
            }

            if(auth()->guard('designer')->user()->is_verified !== 1)
            {
                auth()->guard('designer')->logout();
                return redirect(route('send-verification-designer'));
            }
        }

        return $next($request);
    }
}
