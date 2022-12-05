<?php

namespace App\Http\Controllers;

use App\Models\CareerLevel;
use App\Models\EducationLevel;
use App\Models\Job;
use App\Models\JobType;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Traits\SlugTrait;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class JobApiController extends Controller
{
    use ApiResponser;
    use SlugTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DataTables::of(Job::query()->orderBy('created_at', 'desc'))
        ->addColumn('category', function ($job) {
            return ($job->category ? $job->category->name : '');
        })
        ->addColumn('approve', function ($job) {
            if ($job->admin_approve == 0) {
                $input = '<input data-action="approve" type="checkbox" class="switch" name="switchstatus" >';
            } else {
                $input = '<input data-action="approve" type="checkbox" class="switch" name="switchstatus" checked>';
            }
            return '<label class="switch">' . $input . '<span class="slider round"></span></label>';
        })
        ->addColumn('close', function ($job) {
            if ($job->job_status == 1) {
                $input = '<input data-action="close" type="checkbox" class="switch" name="switchstatus" >';
            } else {
                $input = '<input data-action="close" type="checkbox" class="switch" name="switchstatus" checked>';
            }
            return '<label class="switch">' . $input . '<span class="slider round"></span></label>';
        })
        ->addColumn('created_at', function ($job) {
            return $job->created_at->format('Y-m-d');
        })
        ->addColumn('employer', function ($job) {
            return ($job->employer ? $job->employer->name : '');
        })
        ->editColumn('id', '{{$id}}')
        ->rawColumns(['created_at','category' ,'employer', 'approve', 'close'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $validator = Validator::make($input, [
            'title' => 'required|string',
            'category_id' => 'required|numeric',
            'employer_id' => 'required|numeric',
            'career_level_id' => 'required|numeric',
            'job_type_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            $message = implode("\n", $validator->errors()->all());
            return $this->error($message, 422, $validator->errors());
        }
        $job = Job::create($input);
        $job->type = 'admin';
        $job->save();
        $input['slug'] = $this->createSlug('Job', $job->id, $job->title, 'jobs');
        $job->save();

        return $this->success(['job' => $job], 'Job created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::with(['category', 'employer', 'careerLevel', 'jobType', 'educationLevel'])->find($id);
        return $this->success(['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::with(['category', 'employer', 'careerLevel', 'jobType', 'educationLevel'])->find($id);
        return $this->success(['job' => $job]);
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
        $input = $request->all();
        $job = Job::find($id);
        if (!$job) {
            return $this->error(__('main.not_found'), 404);
        }
        $validator = Validator::make($input, [
            'title' => 'required|string',
            'category_id' => 'required|numeric',
            'employer_id' => 'required|numeric',
            'career_level_id' => 'required|numeric',
            'job_type_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            $message = implode("\n", $validator->errors()->all());
            return $this->error($message, 422, $validator->errors());
        }
        $job = Job::find($id);

        $this->editSlug('Job', $job->id, $job->name, 'jobs');

        $job->update($input);
        $job->save();
        return $this->success(['job' => $job], 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();
        return $this->success('', 'Job deleted Successfully');
    }
    public function approve($id)
    {
        $job = Job::find($id);
        if ($job) {
            $job->admin_approve = ($job->admin_approve == 1 ? 0 : 1);
            if ($job->admin_approve == 1) {
                $job->save();
                return $this->success($job, 'Job Approved Successfully');
            } else {
                $job->save();
                return $this->success($job, 'Job Denied Successfully');
            }
        }
        return $this->error(__('main.item_not_found'), 404);
    }
    public function close($id)
    {
        $job = Job::find($id);
        if ($job) {
            $job->job_status = ($job->job_status == 1 ? 0 : 1);
            if ($job->job_status == 1) {
                $job->save();
                return $this->success($job, 'Job opened Successfully');
            } else {
                $job->save();
                return $this->success($job, 'Job closed Successfully');
            }
        }
        return $this->error(__('main.item_not_found'), 404);
    }
    public function careerLevels()
    {
        $careerLevels = CareerLevel::get();
        return $this->success(['careerLevels' => $careerLevels]);
    }
    public function jobTypes()
    {
        $jobTypes = JobType::get();
        return $this->success(['jobTypes' => $jobTypes]);
    }
    public function educationLevels()
    {
        $educationLevels = EducationLevel::get();
        return $this->success(['educationLevels' => $educationLevels]);
    }
}
