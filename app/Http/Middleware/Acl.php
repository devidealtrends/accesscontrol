<?php

namespace App\Http\Middleware;

use App\Services\AclService;
use Closure;

class Acl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $acl = new  AclService($request);
        if (!$acl->getPemissao()) {
            return abort(403, 'Você não tem permissão para acessar esta área.');
        }
        return $next($request);
    }
}
