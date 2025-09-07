<?php

namespace App\Http\Middleware;

use App\Models\AccessLink;
use Closure;
use Illuminate\Http\Request;

class EnsureAccessLinkIsValid
{

    public function handle(Request $request, Closure $next)
    {
        /** @var AccessLink|null $link */
        $link = $request->route('link');

        if (!$link || !$link->isActive()) {
            abort(404);
        }

        return $next($request);
    }

}
