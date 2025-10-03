<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Routes\web;


class ValidRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public $role;

    public function isAdmin() : bool
    {

        if(rand(1, 2) == 1)
        {
        return true;
        }
        return false;
    }

    public function handle(Request $request, Closure $next): Response
    {

        if($this->isAdmin())
        {
            return response()->json(['error' => 'Доступ запрещён, доступ только админам'], 403);
        }

        return $next($request);
    }
}
