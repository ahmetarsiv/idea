<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\User;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user()->role_id;
        $currentRoutePrefix = explode('/', $request->route()->getPrefix());
        if (App::routesAreCached() == true) {
            if (in_array($user, $this->userAccessRole()[$currentRoutePrefix[0]])) {
                return $next($request);
            }
        } else {
            if (in_array($user, $this->userAccessRole()[$currentRoutePrefix[1]])) {
                return $next($request);
            }
        }
        abort(401);
    }

    private function userAccessRole()
    {
        return [
            'admin' => [
                User::Admin
            ],
            'manager' => [
                User::Manager
            ],
        ];
    }
}
