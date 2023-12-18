<?php

namespace App\Http\Middleware;

use App\Models\PermissionModel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\GroupModel;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        $currentUri = Route::current()->getName();
       // dd($currentUri);
        //check uri
        $user = Auth::user()->gr_id;
        //dd($user);
    
        $group_permission = PermissionModel::find($user)->permission ?? '';
        // dd($currentUri);
        $allowedRoutes = explode(', ', $group_permission);
    //   dd($allowedRoutes,$currentUri,in_array($currentUri, $allowedRoutes));
        if(in_array($currentUri, $allowedRoutes)){
           // dd($allowedRoutes);
           
            return $next($request);

        }else{

            return to_route('error');
        }
       
    }
}
