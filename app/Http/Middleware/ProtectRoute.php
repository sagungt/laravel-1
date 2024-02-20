<?php

namespace App\Http\Middleware;

use App\Enums\UserType;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProtectRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var User $user */
        $user = $request->route()->mahasiswa;
        $auth = auth()->user();

        if (is_null($user)) {
            return $next($request);
        }

        if ($auth->getAttribute('type') === UserType::ADMIN) {
            return $next($request);
        }

        if ($user->getAttribute('id') === $auth->getAttribute('id')) {
            return $next($request);
        }

        abort(404);
    }
}
