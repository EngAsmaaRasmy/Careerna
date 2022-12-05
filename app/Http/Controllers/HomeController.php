<?php

namespace App\Http\Controllers;

use App\Models\CareerLevel;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Employer;
use App\Models\Job;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    use ApiResponser;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latestJobs = Job::where('admin_approve', 1)->latest()->limit(8)->get();
        $careerLevels = CareerLevel::orderby('created_at', 'DESC')->get();
        $categories = Category::with('jobs')->get();
        $employee = Employee::where('token', session('employee_token'))->first();
        $employer = Employer::where('token', session('employer_token'))->first();
        return view('index', compact('latestJobs', 'careerLevels', 'categories', 'employee', 'employer'));
    }

    public function jobs()
    {
        $jobs = Job::where('admin_approve', 1)->get();
        return view('jobs.all-jobs', compact('jobs'));
    }

    public function search(Request $request)
    {
        $jobs = Job::where('admin_approve', 1)->orderby('created_at', 'DESC')->get();
        if ($jobs) {
            $jobs = $jobs->collect()->filter(function ($job) use ($request) {
                if (Str::contains(strtolower($job->title), strtolower($request->get('search')))) {
                    return $job;
                }
            });
        }
        $search = $request->get('search');
        return view('jobs.search', compact('jobs', 'search'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::with([
            'category',
            'employer',
            'careerLevel',
            'jobType',
            'educationLevel'
        ])->find($id);
        $similarJobs = Job::where('category_id', $job->category_id)->where('id', '!=', $job->id)->inRandomOrder()
            ->limit(10)->get();
        $featuredJobs = Job::with('careerLevel')->where('career_level_id', 4)->where('id', '!=', $job->id)->inRandomOrder()
            ->limit(10)->get();
        return view('jobs.job-details', compact('job', 'similarJobs', 'featuredJobs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
