<?php

namespace App\Http\Middleware;

use App\Models\Employee;
use Closure;
use Illuminate\Http\Request;

class CheckEmployeeCompleteProfile
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
        dd("asmaa");
        $employee = Employee::where('token', session('employee_token'))->first();
        if ($employee->careerDetail && $employee->personalDetail && $employee->educationDetail && $employee->contactDetail) {
            return $next($request);
        }
        return redirect('employee/complete-profile');
    }
}
