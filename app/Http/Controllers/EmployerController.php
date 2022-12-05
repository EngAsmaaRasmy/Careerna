<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Traits\ApiResponser;
use App\Traits\SlugTrait;
use Illuminate\Support\Facades\Validator;
use WisdomDiala\Countrypkg\Models\Country;

class EmployerController extends Controller
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
        return view('employer.employer');
    }
    public function showRegisterForm()
    {
        return view('employer.employer-register');
    }
    public function showLoginForm()
    {
        return view('employer.login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $employer = Employer::where('email', '=', $email)->first();

        if ($employer) {
            if (Hash::check($password, $employer->password)) {

                    $token = uniqid(base64_encode(Str::random(40)));
                    $employer->token = $token;
                    $employer->save();
                    $session = session(['employer_token' => $employer->token, 'employer_id' => $employer->id]);
                    toastr()->success('You are logged in successfully');
                    return redirect()->route('employer.main')->with('employer', $employer);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'email' => 'required|email|unique:employers,email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $otp = $this->otp();
        $employer = Employer::create($input);
        $employer->otp = $otp;
        $token = uniqid(base64_encode(Str::random(40)));
        $employer->token = $token;
        $employer->password = Hash::make($request->password);
        $employer->verified = 1;
        $employer->save();
        toastr()->success('New account created successfully');
        $session = session(['employer_token' => $employer->token, 'employer_id' => $employer->id]);
        return redirect()->route('employer.show.completeProfile')->with('employer', $employer);
    }
    public function otp()
    {
        $otp = rand(1000, 9999);
        return $otp;
    }
    public function dashboard()
    {
        $employer = Employer::where('token', session('employer_token'))->first();
        return view('employer.employer-dashboard', compact('employer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function completeProfile()
    {
        $countries = Country::all();
        $industries = Industry::all()->pluck('name', 'id');
        $employer = Employer::where('token', session('employer_token'))->first();
        return view('employer.complete-profile', compact('industries', 'countries', 'employer'));
    }
    public function updateProfile(Request $request, $id)
    {
        $employer = Employer::find($id);
        $input = $request->all();
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'name' => 'required|string',
            'title' => 'required|string',
            'description' => 'required',
            'employer_size' => 'required',
            'country' => 'required',
            'industries' => 'required',
            'logo' => 'required',
        ]);
        $employer->update($input);
        if ($request->file('logo')) {
            $logo_name = md5($employer->id . "app" . $employer->id . rand(1, 1000));
            $logo_ext = $request->file('logo')->getClientOriginalExtension(); // example: png, jpg ... etc
            $logo_full_name = $logo_name . '.' . $logo_ext;
            $uploads_folder =  getcwd() . '/uploads/employers/';
            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }
            $request->file('logo')->move($uploads_folder, $logo_name  . '.' . $logo_ext);
            $employer->logo =  $logo_full_name;
        }
        $employer->save();
        $employer->industries()->sync($request->input('industries', []));
        toastr()->success('complete profile successfully');
        return redirect()->route('employer.main')->with('employer', $employer);
    }
    public function editProfile()
    {
        $employer = Employer::where('token', session('employer_token'))->first();
        $countries = Country::all();
        $country = Country::where('id', $employer->country)->pluck('id', 'name');
        return view('employer.update-profile', compact('employer', 'countries', 'country'));
    }
    public function update(Request $request, $id)
    {
        $employer = Employer::find($id);
        $input = $request->all();
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'name' => 'required|string',
            'title' => 'required|string',
            'description' => 'required',
            'employer_size' => 'required',
            'country' => 'required',
        ]);
        $employer->update($input);
        if ($request->file('logo')) {
            $logo_name = md5($employer->id . "app" . $employer->id . rand(1, 1000));
            $logo_ext = $request->file('logo')->getClientOriginalExtension(); // example: png, jpg ... etc
            $logo_full_name = $logo_name . '.' . $logo_ext;
            $uploads_folder =  getcwd() . '/uploads/employers/';
            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }
            $request->file('logo')->move($uploads_folder, $logo_name  . '.' . $logo_ext);
            $employer->logo =  $logo_full_name;
        }
        $employer->save();
        toastr()->success('update profile successfully');
        return redirect()->route('employer.main')->with('employer', $employer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        $employer = Employer::where('token', session('employer_token'))->first();
        if (session('employer_token') !== null) {
            $employer->token = null;
            $employer->save();
            Session::forget('token');
            Session::flush();
            toastr()->success('Signed out successfully');
            return redirect('/');
        }
    }
}
