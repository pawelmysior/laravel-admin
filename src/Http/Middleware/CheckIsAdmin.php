<?php

namespace PawelMysior\Admin\Http\Middleware;

use Closure;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CheckIsAdmin
{
    public function handle($request, Closure $next)
    {
        if (!$request->user()->isAdmin()) {
            throw new HttpException(403);
        }

        return $next($request);
    }
}
