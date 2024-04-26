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
        if ($request->session()->get('businessId')){


        }else{
            $businessCount = Auth::user()->businesses->count();
            if ($businessCount == 1){
                /*Add to Session**/
                $request->session()->put('businessId', Auth::user()->businesses[0]->id);
                return  redirect('/dashboard');
            }
            elseif ($businessCount == 0){
                return  redirect('/?register=true');
            }elseif ($businessCount > 1){
                //Multiple business
                return  redirect('/?selectBusiness=true');
            }
        }

        return $next($request);
    }
}
//return  redirect('/?register=true');
