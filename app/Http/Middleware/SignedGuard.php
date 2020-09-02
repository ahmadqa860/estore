<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class SignedGuard
{
    public function handle($request, Closure $next)
    {
        if (Session::has('user_id')) {
            return redirect('');
        } else {
            return $next($request);
        }
    }
}
