<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Services\RolesService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()){
            abort(403);
        }
        $roles = RolesService::getRoles(auth()->user()->username);
        if (in_array("group.admin", $roles)){
            return $next($request);
        }else{
            abort(403);
        }
    }
}
