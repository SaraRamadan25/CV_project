<?php

namespace App\Http\Middleware;

use Closure;
use http\Env\Response;
use Illuminate\Http\Request;

class AdminMiddleware
{

public function handle(Request $request, Closure $next)
{
    if(auth()->user()?->name  != 'admin'){
        abort(403,'you are not allowed to access this page');
    }
    return $next($request);
}

}
