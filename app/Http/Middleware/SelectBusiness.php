<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SelectBusiness
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $businessCount = Auth::user()->businesses->count();
        if ($businessCount == 1){
            /*Add to Session**/
        }
        elseif ($businessCount == 0){
            return  redirect('/?register=true');
        }
        return $next($request);
    }
}
