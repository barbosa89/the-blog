<?php

namespace App\Http\Middleware;

use App\Constants\Permissions;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureHasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        $permission = Permissions::tryFrom($permission);

        if ($request->user()->permissions->contains('name', $permission->value)) {
            return $next($request);
        }

        abort(Response::HTTP_FORBIDDEN);
    }
}
