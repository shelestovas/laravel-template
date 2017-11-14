<?php

namespace App\Http\Middleware;

use App\Helpers\AdminMenuHelper;
use Closure;
use Sentinel;

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
        if(Sentinel::check() && Sentinel::getUser()->hasAccess('admin.panel')) {
            AdminMenuHelper::generateMainAdminMenu();
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
