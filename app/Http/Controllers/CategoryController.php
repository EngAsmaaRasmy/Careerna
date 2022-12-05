<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Employee;
use App\Models\Employer;
use App\Models\Job;
use App\Models\AppliedJob;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Traits\SlugTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
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
        return DataTables::of(Category::query()->orderBy('created_at', 'DESC'))
        ->addColumn('created_at', function ($category) {
            return $category->created_at->format('Y-m-d');
        })
        ->addColumn('icon', function ($category) {
            return '<img src="' . $category->icon_full_path . '" border="0" width="50" hight= "50;"  class="icon img-rounded" align="center"/>';
        })
        ->editColumn('id', '{{$id}}')
        ->rawColumns(['created_at' ,'icon'])
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
            'name' => 'required|string|unique:categories,name',
        ]);

        if ($validator->fails()) {
            $message = implode("\n", $validator->errors()->all());
            return $this->error($message, 422, $validator->errors());
        }
        $category = Category::create($input);
        $input['slug'] = $this->createSlug('Category', $category->id, $category->name, 'categories');

        if ($request->file('icon')) {
            $icon_name = md5($category->id . "app" . $category->id . rand(1, 1000));
            $icon_ext = $request->file('icon')->getClientOriginalExtension(); // example: png, jpg ... etc
            $icon_full_name = $icon_name . '.' . $icon_ext;
            $uploads_folder =  getcwd() . '/uploads/categories/';
            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }
            $request->file('icon')->move($uploads_folder, $icon_name  . '.' . $icon_ext);
            $category->icon =  $icon_full_name;
        }
        $category->save();

        return $this->success(['category' => $category], 'Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::with('jobs')->find($id);
        return $this->success(['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return $this->success(['category' => $category]);
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
        $category = Category::find($id);
        if (!$category) {
            return $this->error(__('main.not_found'), 404);
        }
        $validator = Validator::make($input, [
            'name' => 'required|string|unique:categories,name,' . $category->id
        ]);

        if ($validator->fails()) {
            $message = implode("\n", $validator->errors()->all());
            return $this->error($message, 422, $validator->errors());
        }
        $category = Category::find($id);

        $this->editSlug('Category', $category->id, $category->name, 'categories');

        $category->update($input);

        if ($request->file('icon')) {
            $icon_name = md5($category->id . "app" . $category->id . rand(1, 1000));
            $icon_ext = $request->file('icon')->getClientOriginalExtension(); // example: png, jpg ... etc
            $icon_full_name = $icon_name . '.' . $icon_ext;
            $uploads_folder =  getcwd() . '/uploads/categories/';
            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }
            $request->file('icon')->move($uploads_folder, $icon_name  . '.' . $icon_ext);
            $category->icon =  $icon_full_name;
        }
        $category->save();
        return $this->success(['category' => $category], 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category->icon) {
            File::delete(public_path() . "/uploads/categories" . $category->icon);
        }
        $category->delete();
        return $this->success('', 'Category removed successfully');
    }
    public function statistics()
    {
        $input['employees'] = Employee::count();
        $input['employers'] = Employer::count();
        $input['jobs'] = Job::count();
        $input['job_applications'] = AppliedJob::count();
        return $this->success($input);
    }
}
