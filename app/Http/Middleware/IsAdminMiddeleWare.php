<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class IsAdminMiddeleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
if(Auth::check())
{
    if(Auth::user()->is_admin==1)   { return $next($request);}
    else  { Abort(code:403);}
}
else
{return redirect()->back()->with('status','you should login');}

    }
}
