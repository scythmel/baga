<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

/***
 * This Middleware Checks if the User is allowed to access the requested page based on the Role specified in routes.php
 */
class RequireRole
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  array $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $user = $this->auth->user();
        if ($user) {
            $roles = explode('|', $role);
            if (!in_array($user->role, $roles)) {
                $page = $request->route()->getName();
                session(['warning' => 'You are restricted from accessing "' . $page . '" !']);
                return redirect('/');
            }
        } else {
            return redirect()->guest('login');
        }

        return $next($request);
    }
}
