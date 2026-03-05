<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $normalizedRoles = collect($roles)
            ->flatMap(fn (string $role): array => preg_split('/[|,]/', $role) ?: [])
            ->map(fn (string $role): string => trim($role))
            ->filter()
            ->values()
            ->all();

        if (! $request->user() || ! $request->user()->hasAnyRole($normalizedRoles)) {
            abort(403, 'Unauthorized role.');
        }

        return $next($request);
    }
}
