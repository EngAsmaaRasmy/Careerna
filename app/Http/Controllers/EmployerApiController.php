<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Traits\ApiResponser;
use WisdomDiala\Countrypkg\Models\Country;
use Yajra\DataTables\Facades\DataTables;

class EmployerApiController extends Controller
{
    use ApiResponser;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DataTables::of(Employer::query()->orderBy('created_at', 'desc'))
        ->addColumn('created_at', function ($employer) {
            return $employer->created_at->format('Y-m-d: H:i:s');
        })
        ->addColumn('name', function ($employer) {
            return $employer->name ?? '--------------';
        })
        ->editColumn('id', '{{$id}}')
        ->rawColumns(['created_at', 'name'])
        ->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employer = Employer::with('jobs')->find($id);
        $country = Country::where('id', $employer->country)->first();
        return $this->success(['employer' => $employer, 'country' => $country]);
    }
}
