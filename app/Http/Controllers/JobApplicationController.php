<?php

namespace App\Http\Controllers;

use App\Models\AppliedJob;
use App\Traits\ApiResponser;
use Yajra\DataTables\Facades\DataTables;

class JobApplicationController extends Controller
{
    use ApiResponser;

    public function index()
    {
        return DataTables::of(AppliedJob::query()->with(['employee', 'job'])->orderBy('created_at', 'desc'))
        ->addColumn('approve', function ($employee) {
            if ($employee->status_id == 0) {
                $input = '<input data-action="approve" type="checkbox" class="switch" name="switchstatus" >';
            } else {
                $input = '<input data-action="approve" type="checkbox" class="switch" name="switchstatus" checked>';
            }
            return '<label class="switch">' . $input . '<span class="slider round"></span></label>';
        })
        ->addColumn('job', function ($employee) {
            return $employee->job->title;
        })
        ->addColumn('employee', function ($employee) {
            return ($employee->employee->personalDetail ? $employee->employee->personalDetail->first_name . ' ' . $employee->employee->personalDetail->last_name : '');
        })
        ->addColumn('created_at', function ($employee) {
            return $employee->created_at->format('Y-m-d');
        })
        ->editColumn('id', '{{$id}}')
        ->rawColumns(['created_at', 'approve', 'job', 'employee'])
        ->make(true);
    }

    public function list()
    {
        $employees = AppliedJob::orderby('created_at', 'DESC')->get();

        return $this->success($employees);
    }
    public function show($id)
    {
        $applied = AppliedJob::with(['job.category', 'job.employer', 'employee.personalDetail', 'employee.contactDetail'])->find($id);
        return $this->success($applied);
    }
    public function approve($id)
    {
        $application = AppliedJob::find($id);
        if ($application) {
            $application->status_id = ($application->status_id == 1 ? 0 : 1);
            if ($application->status_id == 1) {
                $application->save();
                return $this->success($application, 'Job Application Approved Successfully');
            } else {
                $application->save();
                return $this->success($application, 'Job Application Denied Successfully');
            }
        }
        return $this->error(__('main.item_not_found'), 404);
    }
}
