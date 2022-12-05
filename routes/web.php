<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'employer'], function () {
    Route::get('employer', [EmployerController::class, 'index'])->name('employer');
    Route::get('register', [EmployerController::class, 'showRegisterForm'])->name('employer.show.register.form');
    Route::post('register', [EmployerController::class, 'register'])->name('employer.register');
    Route::get('login', [EmployerController::class, 'showLoginForm'])->name('employer.show.login.form');
    Route::post('login', [EmployerController::class, 'login'])->name('employer.login');
    Route::group(
        ['middleware' => ['employer_auth']],
        function () {
            Route::get('/', [EmployerController::class, 'dashboard'])->name('employer.main');
            Route::resource('site-jobs', JobController::class);
            Route::get('post-job', [JobController::class, 'postJob'])->name('employer.postJob');
            Route::get('edit-job/{id}', [JobController::class, 'editJob'])->name('employer.editJob');
            Route::get('show-job/{id}', [JobController::class, 'showJob'])->name('employer.showJob');
            Route::get('logout', [EmployerController::class, 'logout'])->name('employer.logout');
            Route::get('complete-profile', [EmployerController::class, 'completeProfile'])->name('employer.show.completeProfile');
            Route::post('complete-profile/{id}', [EmployerController::class, 'UpdateProfile'])->name('employer.completeProfile');
            Route::get('update', [EmployerController::class, 'editProfile'])->name('employer.show.updateProfile');
            Route::post('update/{id}', [EmployerController::class, 'update'])->name('employer.updateProfile');
        }
    );
});
Route::group(['prefix' => 'employee'], function () {
    Route::get('register', [EmployeeController::class, 'showRegisterForm'])->name('employee.register.form');
    Route::post('register', [EmployeeController::class, 'store'])->name('employee.register');
    Route::get('login', [EmployeeController::class, 'showLoginForm'])->name('employee.show.login.form');
    Route::post('login', [EmployeeController::class, 'login'])->name('employee.login');
    Route::get('complete-profile', [EmployeeController::class, 'completeProfile'])->name('employee.show.completeProfile');
    Route::post('complete-profile/{id}', [EmployeeController::class, 'completeInfo'])->name('employee.completeProfile');
    Route::get('general-info/{id}', [EmployeeController::class, 'generalInfo'])->name('employee.show.generalInfo');
    Route::post('general-info/{id}', [EmployeeController::class, 'updateGeneralInfo'])->name('employee.updateGeneralInfo');
    Route::get('education-info/{id}', [EmployeeController::class, 'educationInfo'])->name('employee.show.educationInfo');
    Route::post('education-info/{id}', [EmployeeController::class, 'updateEducationInfo'])->name('employee.updateEducationInfo');
    Route::get('career-info/{id}', [EmployeeController::class, 'careerInfo'])->name('employee.show.careerInfo');
    Route::post('career-info/{id}', [EmployeeController::class, 'updateCareerInfo'])->name('employee.updateCareerInfo');
    Route::get('skills-info/{id}', [EmployeeController::class, 'skillsInfo'])->name('employee.show.skillsInfo');
    Route::get('update-cv/{id}', [EmployeeController::class, 'uploadCV'])->name('employee.show.uploadCV');
    Route::post('update-cv/{id}', [EmployeeController::class, 'updateCV'])->name('employee.updateCV');
    Route::post('edit-profile/{id}', [EmployeeController::class, 'editProfile'])->name('employee.editProfile');
    Route::post('add-university-degree', [EmployeeController::class, 'addUniversityDegree'])->name('employee.addUniversityDegree');
    Route::post('add-experience', [EmployeeController::class, 'addExperience'])->name('employee.addExperience');
    Route::post('add-skill', [EmployeeController::class, 'addSkill'])->name('employee.addSkill');
    Route::post('add-language', [EmployeeController::class, 'addLanguage'])->name('employee.addLanguage');
    Route::get('logout', [EmployeeController::class, 'logout'])->name('employee.logout');
    Route::group(
        ['middleware' => ['employee_auth']],
        function () {
            Route::get('/', [EmployeeController::class, 'dashboard'])->name('employee.main');
        }
    );
});
Route::get('job/{id}', [HomeController::class, 'show'])->name('jobDetails');
Route::get('all-jobs', [HomeController::class, 'jobs'])->name('allJobs');
Route::post('save-job', [JobController::class, 'saveJob'])->name('saveJob');
Route::get('saved-jobs', [JobController::class, 'allSavedJobs'])->name('savedJobs');
Route::get('delete-saved-job/{id}', [JobController::class, 'deleteSaveJob'])->name('deleteSaveJob');
Route::get('delete-applied-job/{id}', [JobController::class, 'deleteAppliedJob'])->name('deleteAppliedJob');
Route::post('apply-for-job', [JobController::class, 'jobApply'])->name('jobApply');
Route::get('applied-jobs', [JobController::class, 'allAppliedJobs'])->name('appliedJobs');
Route::post('/fetch-cities', [EmployeeController::class, 'fetchCity']);
Route::post('jobs/search', [HomeController::class, 'search'])->name('search');

Route::get('/migrate', function () {
    Artisan::call('migrate', array('--force' => true));
    Artisan::call('route:clear');
    Artisan::call('route:cache');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Done";
});
