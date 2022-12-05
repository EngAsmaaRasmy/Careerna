<?php

namespace App\Http\Middleware;

use App\Models\Employer;
use Closure;
use Illuminate\Http\Request;

class EmployerAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (session('employer_token') !== null) {
            $employer = Employer::where('token', session('employer_token'))->first();
            if ( $employer->first_name && $employer->last_name && $employer->phone) {
                return $next($request);
            } else {
                return redirect('employer/complete-profile');
            }
        }
        return redirect('employer/login');
    }
}
