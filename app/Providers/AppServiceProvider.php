<?php

namespace App\Providers;

use App\Models\Employee;
use App\Models\Employer;
use App\Models\SavedJob;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $employee = Employee::where('token', session('employee_token'))->first();
        $employer = Employer::where('token', session('employer_token'))->first();
        if ($employee) {
            $count = SavedJob::where('employee_id', $employee->id)->count();
            View::share('count', $count);
        }
        View::share('employee', $employee);
        View::share('employer', $employer);
    }
}
