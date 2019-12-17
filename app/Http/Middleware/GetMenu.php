<?php

namespace App\Http\Middleware;

use App\Menus;
use Closure;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Menus\GetSidebarMenu;

class GetMenu
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
        $menus = Menus::whereMenuId(1)->get();
        view()->share('menu', $menus );
        return $next($request);
    }
}