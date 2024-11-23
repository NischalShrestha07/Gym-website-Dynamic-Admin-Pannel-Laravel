<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (Auth::check() && Auth::user()->role == $role) {

            return $next($request);
        }

        switch (Auth::user()->role) {
            case 'Admin':
                return redirect()->route('dashboard')->with('error', 'Unauthorized Access');
            case 'Trainer':
                return redirect()->route('trainerDashboard')->with('error', 'Unauthorized Access');
            case 'Staff':
                return redirect()->route('staffDashboard')->with('error', 'Unauthorized Access');
            case 'Member':
                return redirect()->route('memberDashboard')->with('error', 'Unauthorized Access');
            default:
                return redirect()->route('admin.login')->with('error', 'Unauthorized Access');
        }
    }
}
