<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (isset(Auth::user()->role)){
            if(Auth::user()->role==0){
                // dd('qưdqwd');
                return $next($request);
            }
            if(Auth::user()->role!=0){
          
                return to_route('error');
            } 
            
        }
        return $next($request);
    }
    
}
