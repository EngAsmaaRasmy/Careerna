<?php

namespace App\Http\Controllers;

use App\Models\AppliedJob;
use App\Models\CareerLevel;
use App\Models\Category;
use App\Models\EducationLevel;
use App\Models\Employee;
use App\Models\Employer;
use App\Models\Job;
use App\Models\JobType;
use App\Models\SavedJob;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Traits\SlugTrait;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    use ApiResponser;
    use SlugTrait;

    public function postJob()
    {
        $categories = Category::get();
        $educationLevels = EducationLevel::get();
        $careerLevels = CareerLevel::get();
        $jobTypes = JobType::get();
        $employer = Employer::where('token', session('employer_token'))->first();
        return view('jobs.post-job', compact('categories', 'educationLevels', 'careerLevels', 'jobTypes', 'employer'));
    }
    public function editJob($id)
    {
        $job = Job::find($id);
        $categories = Category::get();
        $educationLevels = EducationLevel::get();
        $careerLevels = CareerLevel::get();
        $jobTypes = JobType::get();
        $employer = Employer::where('token', session('employer_token'))->first();
        return view('jobs.edit-job', compact('job' ,'categories', 'educationLevels', 'careerLevels', 'jobTypes', 'employer'));
    }
    public function showJob($id)
    {
        $job = Job::find($id);
        $categories = Category::get();
        $educationLevels = EducationLevel::get();
        $careerLevels = CareerLevel::get();
        $jobTypes = JobType::get();
        $appliedJobs = AppliedJob::where('job_id', $id)->get();
        $employer = Employer::where('token', session('employer_token'))->first();
        return view('jobs.show-job', compact('appliedJobs' ,'job' ,'categories', 'educationLevels', 'careerLevels', 'jobTypes', 'employer'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allSavedJobs()
    {
        $employeeId = session('employee_id');
        $savedJobs = SavedJob::where('employee_id', $employeeId)->get();
        $count = SavedJob::where('employee_id', $employeeId)->count();
        return view('employee.saved-jobs', compact('savedJobs', 'count', 'employeeId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveJob(Request $request)
    {
        $employeeId = session('employee_id');
        $employee = Employee::where('id', '=', $employeeId)->first();
        $input = $request->all();
        if ($employee) {
            if (SavedJob::where('employee_id', $employeeId)->where('job_id', $input['job_id'])->count() > 0) {
                        toastr()->success('This Job has already been saved');
                        return redirect()->back();
            } else {
                    $data =
                    [
                        'job_id' => $input['job_id'] ,
                        'employee_id' => $employeeId,
                    ];
                    $save = SavedJob::create($data);
                    toastr()->success('Job saved successfully');
                    return redirect()->back();
            }
        } else {
            return view('employee.employee-login');
        }
    }

    public function deleteSaveJob($id)
    {
        $save = SavedJob::where('job_id', $id)->first();
        $save->delete();
        toastr()->success('Job has been Unsaved');
        return redirect()->back();
    }
    public function deleteAppliedJob($id)
    {
        $apply = AppliedJob::where('job_id', $id)->first();
        $apply->delete();
        toastr()->success('Application has been Discard');
        return redirect()->back();
    }
    public function jobApply(Request $request)
    {
        $employeeId = session('employee_id');
        $employee = Employee::where('id', '=', $employeeId)->first();
        $input = $request->all();
        if ($employee) {
            if (AppliedJob::where('employee_id', $employeeId)->where('job_id', $input['job_id'])->count() > 0) {
                        toastr()->warning('This Job has already been applied');
                        return redirect()->back();
            } else {
                    $data =
                    [
                        'job_id' => $input['job_id'] ,
                        'employee_id' => $employeeId,
                    ];
                    $save = AppliedJob::create($data);
                    toastr()->success('The job application has been submitted successfully');
                    return redirect()->back();
            }
        } else {
            return view('employee.employee-login');
        }
        
    }
    public function allAppliedJobs()
    {
        $employeeId = session('employee_id');
        $appliedJobs = AppliedJob::where('employee_id', $employeeId)->get();
        $count = AppliedJob::where('employee_id', $employeeId)->count();
        return view('employee.applied-jobs', compact('appliedJobs', 'count', 'employeeId'));
    }
    public function index()
    {
        $employer = Employer::where('token', session('employer_token'))->first();
        $jobs = Job::where('employer_id', $employer->id)->get();
        return view('jobs.jobs', compact('jobs', 'employer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['job_type_id'] = $request->get('job_type_id')[0];
        $input['career_level_id'] = $request->get('career_level_id')[0];
        $request->validate([
            'title' => 'required|string',
            'category_id' => 'required',
            'job_type_id' => 'required',
            'career_level_id' => 'required',
            'location' => 'required',
            'vacancies' => 'required',
        ]);
        $job = Job::create($input);
        $job->type = 'employer';
        $job->save();
        toastr()->success('Job created successfully');
        return redirect()->route('site-jobs.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $job = Job::find($id);
        $input = $request->all();
        $input['job_type_id'] = $request->get('job_type_id')[0];
        $input['career_level_id'] = $request->get('career_level_id')[0];
        $request->validate([
            'title' => 'required|string',
            'category_id' => 'required',
            'job_type_id' => 'required',
            'career_level_id' => 'required',
            'location' => 'required',
            'vacancies' => 'required',

        ]);
        $job->update($input);
        toastr()->success('Job updated successfully');
        return redirect()->route('site-jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $job = Job::find($request->id);
        $savedJobs = SavedJob::where('job_id', $request->id)->get();
        if (count($savedJobs) > 0) {
            $savedJobs->delete();
        }
        $job->delete();
        toastr()->success('Job deleted successfully');
        return redirect()->back();
    }
}
