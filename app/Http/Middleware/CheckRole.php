<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $roles = array_slice(func_get_args(), 2); // [default, admin, manager]
        foreach ($roles as $role) {
            try {
                Role::whereName($role)->firstOrFail(); // make sure we got a "real" role

                if (Auth::user()->hasRole($role)) {
                    return $next($request);
                }
            } catch (ModelNotFoundException $exception) {

                dd('Could not find role ' . $role);
            }
        }
        // Flash::warning('Access Denied', 'You are not authorized to view that content.'); // custom flash class

        abort(403);
    }
}
