<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeApiController;
use App\Http\Controllers\EmployerApiController;
use App\Http\Controllers\JobApiController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\MsAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'admin-dashboard'], function () {
    Route::post('login', [MsAuthController::class, 'login']);
    Route::post('logout', [MsAuthController::class, 'logout']);
    Route::group(
        ['middleware' => ['admin_api_auth']],
        function () {
            Route::resource('categories', CategoryController::class);
            Route::resource('employees', EmployeeApiController::class);
            Route::resource('employers', EmployerApiController::class);
            Route::resource('jobs', JobApiController::class);
            Route::get('job/{id}/approve', [JobApiController::class, 'approve']);
            Route::get('job/{id}/close', [JobApiController::class, 'close']);
            Route::resource('applied-jobs', JobApplicationController::class);
            Route::get('application/{id}/approve', [JobApplicationController::class, 'approve']);
            Route::get('statistics', [CategoryController::class, 'statistics']);
            Route::get('career-levels', [JobApiController::class, 'careerLevels']);
            Route::get('job-types', [JobApiController::class, 'jobTypes']);
            Route::get('education-levels', [JobApiController::class, 'educationLevels']);
        }
    );
});
