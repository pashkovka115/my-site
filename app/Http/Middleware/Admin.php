<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->user()->hasPermissionTo(\Route::getCurrentRoute()->getActionName())){
            return back()->withErrors('Не достаточно прав доступа');
        }
        /*if (!auth()->check()){
            return redirect('/');
        }
        $user = User::find(auth()->id());
        if (!$user->is_admin){
            return redirect('/');
        }*/

        return $next($request);
    }
}
