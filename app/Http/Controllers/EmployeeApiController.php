<?php

namespace App\Http\Controllers;

use App\Models\CareerLevel;
use App\Models\EducationDetail;
use App\Models\EducationLevel;
use App\Models\Employee;
use App\Models\JobType;
use App\Traits\ApiResponser;
use WisdomDiala\Countrypkg\Models\Country;
use WisdomDiala\Countrypkg\Models\State;
use Yajra\DataTables\Facades\DataTables;

class EmployeeApiController extends Controller
{
    use ApiResponser;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DataTables::of(Employee::query()->orderBy('created_at', 'desc'))
        ->addColumn('created_at', function ($employee) {
            return $employee->created_at->format('Y-m-d H:i:s');
        })
        ->addColumn('name', function ($employee) {
            return ($employee->personalDetail ? $employee->personalDetail->first_name . ' ' . $employee->personalDetail->last_name : '-------------');
        })
        ->editColumn('id', '{{$id}}')
        ->rawColumns(['created_at'])
        ->make(true);
    }
    public function list()
    {
        $employees = Employee::orderby('created_at', 'DESC')->get();
        return $this->success(['employees' => $employees]);
    }
    public function show($id)
    {
        $employee = Employee::with(['careerDetail', 'ExperienceDetail', 'contactDetail', 'skills', 'languages', 'educationDetail', 'personalDetail', 'jobsApply.job'])->find($id);
        $educationLevel = EducationLevel::where('id', $employee->education_level_id)->first();
        $country = Country::where('id', $employee->personalDetail->country_id)->first();
        $city = State::where('id', $employee->personalDetail->city_id)->first();
        $careerLevel = CareerLevel::where('id', $employee->careerDetail->career_level_id)->first();
        $jobType = JobType::where('id', $employee->careerDetail->job_type_id_id)->first();
        $employee->load('jobTitles');
        $employee->load('categories');
        return $this->success([
            'employee' => $employee,
            'educationLevel' => $educationLevel,
            'country' => $country,
            'state' => $city,
            'careerLevel' => $careerLevel,
            'jobType' => $jobType
        ]);
    }
}
