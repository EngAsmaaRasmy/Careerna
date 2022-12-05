<?php

namespace App\Http\Controllers;

use App\Models\CareerDetail;
use App\Models\CareerLevel;
use App\Models\Category;
use App\Models\ContactDetail;
use App\Models\EducationDetail;
use App\Models\EducationLevel;
use App\Models\Employee;
use App\Models\ExperienceDetail;
use App\Models\Job;
use App\Models\JobTitle;
use App\Models\JobType;
use App\Models\Language;
use App\Models\PersonalDetail;
use App\Models\SavedJob;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Traits\ApiResponser;
use App\Traits\SlugTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use WisdomDiala\Countrypkg\Models\Country;
use WisdomDiala\Countrypkg\Models\State;

class EmployeeController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegisterForm()
    {
        return view('employee.employee-register');
    }
    public function showLoginForm()
    {
        return view('employee.employee-login');
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
        $request->validate([
            'email' => 'required|email|unique:employees,email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        $otp = $this->otp();
        $employee = Employee::create($input);
        $employee->otp = $otp;
        $token = uniqid(base64_encode(Str::random(40)));
        $employee->token = $token;
        $employee->password = Hash::make($request->password);
        $employee->verified = 1;
        $employee->save();
        toastr()->success('New account as Employee created successfully');
        $session = session(['employee_token' => $employee->token, 'employee_id' => $employee->id]);
        return redirect()->route('employee.show.completeProfile')->with('employee', $employee);
    }
    public function otp()
    {
        $otp = rand(1000, 9999);
        return $otp;
    }
    public function completeProfile()
    {
        $countries = Country::all();
        $educationLevels = EducationLevel::get();
        $careerLevels = CareerLevel::get();
        $jobCategories = Category::get();
        $categories = Category::all()->pluck('name', 'id');
        $jobTitles = JobTitle::all()->pluck('name', 'id');
        $jobTypes = JobType::get();
        $employee = Employee::where('token', session('employee_token'))->first();
        $universityDegrees = EducationDetail::where('employee_id', $employee->id)->get();
        $experiences = ExperienceDetail::where('employee_id', $employee->id)->get();
        $skills = Skill::where('employee_id', $employee->id)->get();
        $languages = Language::where('employee_id', $employee->id)->get();
        return view('employee.complete-profile', compact('experiences', 'skills', 'languages', 'jobCategories', 'universityDegrees', 'jobTitles', 'categories', 'employee', 'educationLevels', 'careerLevels', 'jobTypes', 'countries'));
    }
    public function fetchCity(Request $request)
    {
        $data['cities']    = State::where('country_id', $request->country_id)->get();
        return response()->json($data);
    }
    public function addUniversityDegree(Request $request)
    {
        $input = $request->all();
        $universityDegree = EducationDetail::create($input);
        toastr()->info('Add New Degree Successfully');
        return redirect()->back();
    }
    public function addExperience(Request $request)
    {
        $input = $request->all();
        $input['job_type_id'] = $request->input('job_type_id')[0];
        $experience = ExperienceDetail::create($input);
        toastr()->info('Add New Experience Successfully');
        return redirect()->back();
    }
    public function addSkill(Request $request)
    {
        $input = $request->all();
        $skill = Skill::create($input);
        toastr()->info('Add New Skill Successfully');
        return redirect()->back();
    }
    public function addLanguage(Request $request)
    {
        $input = $request->all();
        $skill = Language::create($input);
        toastr()->info('Add New Language Successfully');
        return redirect()->back();
    }
    public function completeInfo(Request $request, $id)
    {
        $employee = Employee::find($id);
        $input = $request->all();
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'data_of_birth' => 'required',
            'gender' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'phone' => 'required|min:11',
            'candidates_status' => 'required',
            'career_level_id' => 'required',
            'job_type_id' => 'required',
            'jobTitles' => 'required',
            'categories' => 'required',
            'salary' => 'required',
            'experience' => 'required',
            'education_level_id' => 'required',

        ]);
        $employee->update($input);
        if ($request->file('cv')) {
            $cv_name = md5($employee->id . "app" . $employee->id . rand(1, 1000));
            $cv_ext = $request->file('cv')->getClientOriginalExtension(); // example: png, jpg ... etc
            $cv_full_name = $cv_name . '.' . $cv_ext;
            $uploads_folder =  getcwd() . '/uploads/employees/cv';
            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }
            $request->file('cv')->move($uploads_folder, $cv_name  . '.' . $cv_ext);
            $employee->cv =  $cv_full_name;
        }
        $employee->save();
        $personalDetails = PersonalDetail::create([
            'employee_id' => $id,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'data_of_birth' => $request->input('data_of_birth'),
            'gender' => $request->input('gender'),
            'country_id' => $request->input('country_id'),
            'city_id' => $request->input('city_id')
        ]);
        if ($request->file('image')) {
            $image_name = md5($employee->id . "app" . $employee->id . rand(1, 1000));
            $image_ext = $request->file('image')->getClientOriginalExtension(); // example: png, jpg ... etc
            $image_full_name = $image_name . '.' . $image_ext;
            $uploads_folder =  getcwd() . '/uploads/employees/';
            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }
            $request->file('image')->move($uploads_folder, $image_name  . '.' . $image_ext);
            $personalDetails->image =  $image_full_name;
        }
        $personalDetails->save();
        $contactDetails = ContactDetail::create([
            'employee_id' => $id,
            'another_phone' => $request->input('another_phone'),
            'phone' => $request->input('phone'),
        ]);
        $careerDetails = CareerDetail::create([
            'employee_id' => $id,
            'career_level_id' => $request->input('career_level_id')[0],
            'job_type_id' => $request->input('job_type_id')[0],
            'salary' => $request->input('salary'),
            'experience' => $request->input('experience'),
            'candidates_status' => $request->input('candidates_status'),
        ]);
        if ($request->input('education_level_id') == '1') {
            $universityDegree = EducationDetail::create([
                'employee_id' => $id,
                'university' => $request->input('university'),
                'field_of_study' => $request->input('field_of_study'),
                'start_year' => $request->input('start_year'),
                'end_year' => $request->input('end_year'),
                'degree' => $request->input('degree'),
                'education_level' => "1"
            ]);
        } elseif ($request->input('education_level_id') == '2') {
            $universityDegree = EducationDetail::create([
                'employee_id' => $id,
                'university' => $request->input('degree_university'),
                'field_of_study' => $request->input('degree_field_of_study'),
                'start_year' => $request->input('degree_start_year'),
                ' end_year' => $request->input('degree_end_year'),
                'degree' => $request->input('degree_degree'),
                'education_level' => "1"
            ]);
            $universityDegree = EducationDetail::create([
                'employee_id' => $id,
                'university' => $request->input('master_university'),
                'field_of_study' => $request->input('master_field_of_study'),
                'start_year' => $request->input('master_start_year'),
                'end_year' => $request->input('master_end_year'),
                'degree' => $request->input('master_degree'),
                'education_level' => "2"
            ]);
        } elseif ($request->input('education_level_id') == '3') {
            $universityDegree = EducationDetail::create([
                'employee_id' => $id,
                'university' => $request->input('doctorate_degree_university'),
                'field_of_study' => $request->input('doctorate_degree_field_of_study'),
                'start_year' => $request->input('doctorate_degree_start_year'),
                'end_year' => $request->input('doctorate_degree_end_year'),
                'degree' => $request->input('doctorate_degree_degree'),
                'education_level' => "1"
            ]);
            $universityDegree = EducationDetail::create([
                'employee_id' => $id,
                'university' => $request->input('doctorate_master_university'),
                'field_of_study' => $request->input('doctorate_master_field_of_study'),
                'start_year' => $request->input('doctorate_master_start_year'),
                'end_year' => $request->input('doctorate_master_end_year'),
                'degree' => $request->input('doctorate_master_degree'),
                'education_level' => "2"
            ]);
            $universityDegree = EducationDetail::create([
                'employee_id' => $id,
                'university' => $request->input('doctorate_university'),
                'field_of_study' => $request->input('doctorate_field_of_study'),
                'start_year' => $request->input('doctorate_start_year'),
                'end_year' => $request->input('doctorate_end_year'),
                'degree' => $request->input('doctorate_degree'),
                'education_level' => "3"
            ]);
        }
        $employee->categories()->sync($request->input('categories', []));
        $employee->jobTitles()->sync($request->input('jobTitles', []));
        toastr()->success('complete profile successfully');
        return redirect()->route('employee.main')->with('employee', $employee);
    }
    public function generalInfo($id)
    {
        $countries = Country::all();
        $employee = Employee::where('id', $id)->first();
        $personalDetail = PersonalDetail::where('employee_id', $employee->id)->first();
        $country = Country::where('id', $personalDetail->country_id)->pluck('name');
        $city = State::where('id', $personalDetail->city_id)->pluck('name');
        $cities = State::where('country_id', $personalDetail->country_id)->get();
        $contactDetail = ContactDetail::where('employee_id', $employee->id)->first();
        $count = SavedJob::where('employee_id', $employee->id)->count();
        return view('employee.general-info', compact('cities', 'countries', 'count', 'employee', 'country', 'city'));
    }
    public function updateGeneralInfo(Request $request, $id)
    {
        $employee = Employee::find($id);
        $input = $request->all();
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'data_of_birth' => 'required',
            'gender' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'phone' => 'required'
        ]);
        $employee->update($input);
        $personalDetails = PersonalDetail::where('employee_id', $employee->id)->first();
        $personalDetails->update([
            'employee_id' => $id,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'data_of_birth' => $request->input('data_of_birth'),
            'gender' => $request->input('gender'),
            'country_id' => $request->input('country_id'),
            'city_id' => $request->input('city_id')
        ]);
        if ($request->file('image')) {
            $image_name = md5($employee->id . "app" . $employee->id . rand(1, 1000));
            $image_ext = $request->file('image')->getClientOriginalExtension(); // example: png, jpg ... etc
            $image_full_name = $image_name . '.' . $image_ext;
            $uploads_folder =  getcwd() . '/uploads/employees/';
            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }
            $request->file('image')->move($uploads_folder, $image_name  . '.' . $image_ext);
            $personalDetails->image =  $image_full_name;
        }
        $personalDetails->save();
        $contactDetails = ContactDetail::where('employee_id', $employee->id)->first();
        $contactDetails->update([
            'employee_id' => $id,
            'another_phone' => $request->input('another_phone'),
            'phone' => $request->input('phone'),
        ]);
        toastr()->info('update general info successfully');
        return redirect()->back();
    }
    public function educationInfo($id)
    {
        $educationLevels = EducationLevel::get();
        $employee = Employee::where('id', $id)->first();
        $bachelor = EducationDetail::where('employee_id', $employee->id)->where('education_level', 1)->first();
        $master = EducationDetail::where('employee_id', $employee->id)->where('education_level', 2)->first();
        $doctorate = EducationDetail::where('employee_id', $employee->id)->where('education_level', 3)->first();
        $universityDegrees = EducationDetail::where('employee_id', $employee->id)->get();
        $educationLevel = EducationLevel::where('id', $employee->education_level_id)->pluck('id', 'name');
        $count = SavedJob::where('employee_id', $employee->id)->count();
        return view('employee.education', compact('doctorate', 'master', 'bachelor', 'educationLevel', 'count', 'employee', 'educationLevels', 'universityDegrees'));
    }
    public function updateEducationInfo(Request $request, $id)
    {
        $employee = Employee::find($id);
        $input = $request->all();
        $employee->update([
            'education_level_id' => $request->input('education_level_id'),
        ]);
        if ($request->input('education_level_id') == '1') {
            $universityDegree = EducationDetail::where("education_level", "1")->first();
            if ($universityDegree) {
                $universityDegree->update([
                    'employee_id' => $id,
                    'university' => $request->input('university'),
                    'field_of_study' => $request->input('field_of_study'),
                    'start_year' => $request->input('start_year'),
                    'end_year' => $request->input('end_year'),
                    'degree' => $request->input('degree'),
                ]);
                DB::table('education_details')->where('employee_id', $employee->id)->where('education_level', '2')->delete();
                DB::table('education_details')->where('employee_id', $employee->id)->where('education_level', '3')->delete();
            } else {
                $universityDegree = EducationDetail::create([
                    'employee_id' => $id,
                    'university' => $request->input('university'),
                    'field_of_study' => $request->input('field_of_study'),
                    'start_year' => $request->input('start_year'),
                    'end_year' => $request->input('end_year'),
                    'degree' => $request->input('degree'),
                    'education_level' => "1"
                ]);
            }
        } elseif ($request->input('education_level_id') == '2') {
            $universityDegree = EducationDetail::where("education_level", "1")->first();
            if ($universityDegree) {
                $universityDegree->update([
                    'employee_id' => $id,
                    'university' => $request->input('degree_university'),
                    'field_of_study' => $request->input('degree_field_of_study'),
                    'start_year' => $request->input('degree_start_year'),
                    'end_year' => $request->input('degree_end_year'),
                    'degree' => $request->input('degree_degree'),
                ]);
            } else {
                $universityDegree = EducationDetail::create([
                    'employee_id' => $id,
                    'university' => $request->input('degree_university'),
                    'field_of_study' => $request->input('degree_field_of_study'),
                    'start_year' => $request->input('degree_start_year'),
                    'end_year' => $request->input('degree_end_year'),
                    'degree' => $request->input('degree_degree'),
                    'education_level' => "1"
                ]);
            }
            $universityDegree = EducationDetail::where("education_level", "2")->first();
            if ($universityDegree) {
                $universityDegree = EducationDetail::where("education_level", "2")->first();
                $universityDegree->update([
                    'employee_id' => $id,
                    'university' => $request->input('master_university'),
                    'field_of_study' => $request->input('master_field_of_study'),
                    'start_year' => $request->input('master_start_year'),
                    'end_year' => $request->input('master_end_year'),
                    'degree' => $request->input('master_degree'),
                ]);
                DB::table('education_details')->where('employee_id', $employee->id)->where('education_level', '3')->delete();
            } else {
                $universityDegree = EducationDetail::create([
                    'employee_id' => $id,
                    'university' => $request->input('master_university'),
                    'field_of_study' => $request->input('master_field_of_study'),
                    'start_year' => $request->input('master_start_year'),
                    'end_year' => $request->input('master_end_year'),
                    'degree' => $request->input('master_degree'),
                    'education_level' => "2"
                ]);
            }
        } elseif ($request->input('education_level_id') == '3') {
            $universityDegree = EducationDetail::where("education_level", "1")->first();
            if ($universityDegree) {
                $universityDegree->update([
                    'employee_id' => $id,
                    'university' => $request->input('doctorate_degree_university'),
                    'field_of_study' => $request->input('doctorate_degree_field_of_study'),
                    'start_year' => $request->input('doctorate_degree_start_year'),
                    'end_year' => $request->input('doctorate_degree_end_year'),
                    'degree' => $request->input('doctorate_degree_degree'),
                ]);
            } else {
                $universityDegree = EducationDetail::create([
                    'employee_id' => $id,
                    'university' => $request->input('doctorate_degree_university'),
                    'field_of_study' => $request->input('doctorate_degree_field_of_study'),
                    'start_year' => $request->input('doctorate_degree_start_year'),
                    'end_year' => $request->input('doctorate_degree_end_year'),
                    'degree' => $request->input('doctorate_degree_degree'),
                    'education_level' => "1"
                ]);
            }
            $universityDegree = EducationDetail::where("education_level", "2")->first();
            if ($universityDegree) {
                $universityDegree->update([
                    'employee_id' => $id,
                    'university' => $request->input('doctorate_master_university'),
                    'field_of_study' => $request->input('doctorate_master_field_of_study'),
                    'start_year' => $request->input('doctorate_master_start_year'),
                    'end_year' => $request->input('doctorate_master_end_year'),
                    'degree' => $request->input('doctorate_master_degree'),
                ]);
            } else {
                $universityDegree = EducationDetail::create([
                    'employee_id' => $id,
                    'university' => $request->input('doctorate_master_university'),
                    'field_of_study' => $request->input('doctorate_master_field_of_study'),
                    'start_year' => $request->input('doctorate_master_start_year'),
                    'end_year' => $request->input('doctorate_master_end_year'),
                    'degree' => $request->input('doctorate_master_degree'),
                    'education_level' => "2"
                ]);
            }
            $universityDegree = EducationDetail::where("education_level", "3")->first();
            if ($universityDegree) {
                $universityDegree->update([
                    'employee_id' => $id,
                    'university' => $request->input('doctorate_university'),
                    'field_of_study' => $request->input('doctorate_field_of_study'),
                    'start_year' => $request->input('doctorate_start_year'),
                    'end_year' => $request->input('doctorate_end_year'),
                    'degree' => $request->input('doctorate_degree'),
                ]);
            } else {
                $universityDegree = EducationDetail::create([
                    'employee_id' => $id,
                    'university' => $request->input('doctorate_university'),
                    'field_of_study' => $request->input('doctorate_field_of_study'),
                    'start_year' => $request->input('doctorate_start_year'),
                    'end_year' => $request->input('doctorate_end_year'),
                    'degree' => $request->input('doctorate_degree'),
                    'education_level' => "3"
                ]);
            }
        } elseif (($request->input('education_level_id')) == '4' ||
            ($request->input('education_level_id')) == '5' ||
            ($request->input('education_level_id')) == '6'
        ) {
            DB::table('education_details')->where('employee_id', $employee->id)->delete();
        }
        toastr()->info('update Education info successfully');
        return redirect()->back();
    }
    public function skillsInfo($id)
    {
        $employee = Employee::where('id', $id)->first();
        $skills = Skill::where('employee_id', $employee->id)->get();
        $languages = Language::where('employee_id', $employee->id)->get();
        $count = SavedJob::where('employee_id', $employee->id)->count();
        return view('employee.skills', compact('skills', 'count', 'employee', 'languages'));
    }
    public function careerInfo($id)
    {
        $careerLevels = CareerLevel::get();
        $jobTypes = JobType::get();
        $employee = Employee::where('id', $id)->first();
        $careerDetails = CareerDetail::where('employee_id', $employee->id)->first();
        $jobTitles = JobTitle::all()->pluck('name', 'id');
        $categories = Category::all()->pluck('name', 'id');
        $jobCategories = Category::get();
        $experiences = ExperienceDetail::where('employee_id', $employee->id)->get();
        $employee->load('jobTitles');
        $employee->load('categories');
        $count = SavedJob::where('employee_id', $employee->id)->count();
        return view('employee.career', compact('jobCategories', 'categories', 'experiences', 'jobTitles', 'count', 'employee', 'careerLevels', 'careerDetails', 'jobTypes'));
    }
    public function updateCareerInfo(Request $request, $id)
    {
        $employee = Employee::find($id);
        $input = $request->all();
        $request->validate([
            'career_level_id' => 'required',
            'job_type_id' => 'required',
            'salary' => 'required',
            'experience' => 'required',
            'candidates_status' => 'required',
        ]);
        $careerDetails = CareerDetail::where('employee_id', $employee->id)->first();
        $careerDetails->update([
            'employee_id' => $id,
            'career_level_id' => $request->input('career_level_id')[0],
            'job_type_id' => $request->input('job_type_id')[0],
            'salary' => $request->input('salary'),
            'experience' => $request->input('experience'),
            'candidates_status' => $request->input('candidates_status'),
        ]);
        $employee->categories()->sync($request->input('categories', []));
        $employee->jobTitles()->sync($request->input('jobTitles', []));
        toastr()->info('update Career info successfully');
        return redirect()->back();
    }
    public function uploadCV($id)
    {
        $employee = Employee::where('id', $id)->first();
        $count = SavedJob::where('employee_id', $employee->id)->count();
        return view('employee.upload-cv', compact('count', 'employee'));
    }
    public function updateCV(Request $request, $id)
    {
        $employee = Employee::find($id);
        if ($request->file('cv')) {
            $cv_name = md5($employee->id . "app" . $employee->id . rand(1, 1000));
            $cv_ext = $request->file('cv')->getClientOriginalExtension(); // example: png, jpg ... etc
            $cv_full_name = $cv_name . '.' . $cv_ext;
            $uploads_folder =  getcwd() . '/uploads/employees/cv';
            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }
            $request->file('cv')->move($uploads_folder, $cv_name  . '.' . $cv_ext);
            $employee->cv =  $cv_full_name;
        }
        $employee->save();
        toastr()->info('update CV  successfully');
        return redirect()->back();
    }
    public function dashboard()
    {
        $employee = Employee::where('token', session('employee_token'))->first();
        $jobs = Job::where('admin_approve', 1)->get();
        return view('employee.explore', compact('employee', 'jobs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $employee = Employee::where('email', $email)->first();
        if ($employee) {
            if (Hash::check($password, $employee->password)) {
                $token = uniqid(base64_encode(Str::random(40)));
                $employee->token = $token;
                $employee->save();
                $session = session(['employee_token' => $employee->token, 'employee_id' => $employee->id]);
                toastr()->success('You are logged in successfully');
                return redirect()->route('employee.main')->with('employee', $employee);
            } else {
                toastr()->warning('The password is incorrect');
                return redirect()->back();
            }
        } else {
            toastr()->warning('This user does not have an account on the site, please create an account first');
            return redirect()->back();
        }
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
    public function logout()
    {
        $employee = Employee::where('token', session('employee_token'))->first();
        if (session('employee_token') !== null) {
            $employee->token = null;
            $employee->save();
            Session::forget('token');
            Session::flush();
            toastr()->success('Signed out successfully');
            return redirect('/');
        }
    }
}
