<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $action = $request->route()->getAction();
        $roles = isset($action['roles']) ? $action['roles'] : null;
    
        //dd($roles,$request->user()->hasAnyRole($roles));
        if ($request->user()->hasAnyRole($roles) || !$roles) {
            return $next($request);
        }
        
        return response()->view('layouts.403', [], Response::HTTP_FORBIDDEN);
    }
}
