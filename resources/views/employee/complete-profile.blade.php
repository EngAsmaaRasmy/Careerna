@extends('layouts.base ' ,['title'=>'CAREERNA | Compete your profile'])

@section("content")
<main id="main">
  <section id="contact" class="contact">
    <!---end Models--->
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-11 col-sm-7 col-md-9 col-lg-8 col-xl-8 text-center p-0 mb-2">
          <div class="card px-0 pt-4 pb-0  mb-3">
            <h2 id="heading">Complete Your Account</h2>
            <p>Fill all form field to go to next step</p>
            <div id="msform">
              <!-- progressbar -->
              <ul id="progressbar">
                <li class="active" id="personal"><strong>Personal</strong></li>
                <li id="career"><strong>Career</strong></li>
                <li id="education"><strong>Education</strong></li>
                <li id="cv"><strong>Upload Your CV</strong></li>
              </ul>
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div> <br> <!-- fieldsets -->
              @include("alert.success")
              @include("alert.error")
              <form action="{{ route('employee.completeProfile' , [$employee->id]) }}" method="post"
                enctype="multipart/form-data" onsubmit="return validateMyForm();">
                {{ csrf_field() }}
                <fieldset>
                  <div class="row">
                    <div class="col-7">
                      <h2 class="fs-title">Personal Information:</h2>
                    </div>
                    <div class="col-5">
                      <h2 class="steps">Step 1 - 4</h2>
                    </div>
                  </div>

                  <div class="form-card">
                    <h1 class="css-1xujd68">Your Personal Info</h1>
                    <div class="row">
                      <div class="form-group col-md-6 mt-3">
                        <label class="css-1xujd69" for="name">Profile Photo </label>
                        <br>
                        <small style="font-size: 11px">You can upload a .jpg, .png, or .gif photo with max size of
                          5MB.</small>
                        <input type="file" class="form-control" value="{{ old('image', '') }}" name="image"
                          accept="image/*" placeholder='&#xf0ac;'>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label class="css-1xujd69" for="name">First Name <span class="colo">*</span></label>
                          <input type="text" name="first_name" value="{{ old('first_name', '') }}" class="form-control"
                            required placeholder='&#xf007;'>
                        </div>
                        <div class="form-group col-md-6 mt-3 mt-md-0">
                          <label class="css-1xujd69" for="name">Last Name <span class="colo">*</span></label>
                          <input type="text" class="form-control" value="{{ old('last_name', '') }}" name="last_name"
                            required placeholder='&#xf007;'>
                        </div>
                      </div>
                      <div class="form-group col-md-6 mt-3">
                        <label class="css-1xujd69" for="name">Date of Birth <span class="colo">*</span> </label>
                        <input type="date" class="form-control" value="{{ old('data_of_birth', '') }}"
                          name="data_of_birth" required placeholder='&#xf0e0;'>
                      </div>
                      <div class="form-group mt-3">
                        <label class="css-1xujd69" for="name">Gender</label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline1" {{old('gender')=='male' ? 'checked' : '' }}
                            name="gender" value="male" class="custom-control-input">
                          <label class="custom-control-label" for="customRadioInline1"><i
                              class=" bi-gender-male"></i>Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline2" name="gender" {{old('gender')=='female'
                            ? 'checked' : '' }} value="female" class="custom-control-input">
                          <label class="custom-control-label" for="customRadioInline2"><i
                              class=" bi-gender-female"></i>Female</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="break" style="height: 20px; background-color:#fff; width: 100%"></div>
                  <div class="form-card">
                    <div class="row">
                      <h1 class="css-1xujd68">Your Location</h1>
                      <div class="form-group col-md-6 mt-3">
                        <label class="css-1xujd69" for="name">Country <span class="colo">*</span> </label>
                        <select class="form-select" aria-label="Default select example"
                          value="{{ old('country_id', '') }}" required id="country" name="country_id">
                          <option selected>select Country</option>
                          @foreach($countries as $country)
                          @if (old('country_id') == $country->id)
                          <option value="{{$country->id}}" selected>{{$country->name}}</option>
                          @else
                          <option value="{{$country->id}}">{{$country->name}}</option>
                          @endif
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group mt-3 col-md-6">
                        <label class="css-1xujd69" for="name">City <span class="colo">*</span> </label>
                        <select class="form-select" aria-label="Default select example" required id="city"
                          name="city_id">
                        </select>

                      </div>
                    </div>
                  </div>
                  <div class="break" style="height: 20px; background-color:#fff; width: 100%"></div>
                  <div class="form-card">
                    <h1 class="css-1xujd68">Your Contact Info</h1>
                    <div class="row">
                      <div class="form-group col-md-6 mt-3">
                        <label class="css-1xujd69" for="name">Phone Number <span class="colo">*</span> </label>
                        <input type="phone" class="form-control" value="{{old('phone')}}" name="phone" required
                          placeholder='&#xf095;'>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6 mt-3">
                        <label class="css-1xujd69" for="name">Alternative Number <small>(optional)</small> </label>
                        <input type="phone" class="form-control" value="{{old('another_phone')}}" name="another_phone"
                          placeholder='&#xf095;'>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="next" class="next action-button">Next</button>

                </fieldset>
                <fieldset>
                  <div class="row">
                    <div class="col-7">
                      <h2 class="fs-title">Career Information:</h2>
                    </div>
                    <div class="col-5">
                      <h2 class="steps">Step 2 - 4</h2>
                    </div>
                  </div>
                  <div class="form-card">
                    <div class="row">
                      <div class="form-group col-md-12 mb-5">
                        <label class="css-1xujd68" for="name">What is your current job search status? <span
                            class="colo">*</span></label>
                        <select class="form-select" aria-label="Default select example" required
                          name="candidates_status" value="{{old('candidates_status')}}">
                          <option selected>choose your candidates’ status</option>
                          <option value="1" {{old('candidates_status')=="1" ? 'selected' : '' }}> I am unemployed and
                            desperate looking for a job</option>
                          <option value="2" {{old('candidates_status')=="2" ? 'selected' : '' }}>I am actively looking
                            for new jobs and opportunities</option>
                          <option value="3" {{old('candidates_status')=="3" ? 'selected' : '' }}>I am happy where I am
                            but don’t mind finding good opportunities</option>
                          <option value="4" {{old('candidates_status')=="4" ? 'selected' : '' }}>I am only interested in
                            very specific opportunities</option>
                          <option value="5" {{old('candidates_status')=="5" ? 'selected' : '' }}>I am not looking for a
                            job</option>
                        </select>

                      </div>
                      <div class="form-group mb-4">
                        <label class="css-1xujd68"> What's your current Career level? <span
                            class="colo">*</span></label>
                        <br>
                        <div class="row">
                          @foreach($careerLevels as $careerLevel)
                          <div class="col-md-3">
                            <input {{ in_array($careerLevel->id, old('career_level_id', [])) ? 'checked' : '' }}
                            required type="radio" class="btn-check" name="career_level_id[]"
                            id="careerLevel33{{$careerLevel->id}}" value="{{$careerLevel->id}}" autocomplete="off" />
                            <label
                              style="font-size: 14px; display: flex; align-items: center; justify-content:center; width: 100%; height: 60px; border-radius: 0px;"
                              class="btn btn-secondary" for="careerLevel33{{$careerLevel->id}}">
                              {{$careerLevel->name}}</label>
                          </div>
                          @endforeach
                        </div>
                      </div>
                      <div class="form-group mb-4">
                        <label class="css-1xujd68">What type of job are you open to? <span class="colo">*</span>
                        </label><br>
                        <div class="row btn-group">
                          @foreach($jobTypes as $jobType)
                          <div class="col-md-3">
                            <input {{ in_array($jobType->id, old('job_type_id', [])) ? 'checked' : '' }}
                            required type="radio" class="btn-check" name="job_type_id[]" id="jobType55{{$jobType->id}}"
                            autocomplete="off" value="{{$jobType->id}}">
                            <label
                              style="font-size: 14px; display: flex; align-items: center; justify-content:center; width: 100%; height: 40px;"
                              class="btn btn-secondary " for="jobType55{{$jobType->id }}">
                              {{$jobType->name}}
                              <i class="fa fa-check"></i>
                            </label>
                          </div>
                          @endforeach
                        </div>
                      </div>
                      <div class="col-md-12 form-group mb-5">
                        <label class="css-1xujd68">What are the job titles that describe what you are looking for?
                          <span class="css-teaycm e7oqu6k0">— Add at least 2</span></label>
                        <br>
                        <select class="form-control completeJobTitles" id="jobTitles" multiple required
                          name="jobTitles[]">
                          @foreach($jobTitles as $id => $jobTitles)
                          <option value="{{ $id }}" {{ in_array($id, old('jobTitles', [])) ? 'selected' : '' }}>{{
                            $jobTitles }}</option>
                          @endforeach
                        </select>
                      </div>
                      <span id="jobError" class="text-danger" style="display: none; font-size: 13px;">Please choose at
                        least two</span>
                      <div class="col-md-12 form-group mb-3">
                        <label class="css-1xujd68">What job categories are you interested in??
                          <span class="css-teaycm e7oqu6k0">— Add at least 2</span></label>
                        <br>
                        <select class="form-control completeCategories" id="categories" multiple required
                          name="categories[]">
                          @foreach($categories as $id => $categories)
                          <option value="{{ $id }}" {{ in_array($id, old('categories', [])) ? 'selected' : '' }}>{{
                            $categories }}</option>
                          @endforeach
                        </select>
                      </div>
                      <span id="categoryError" class="text-danger" style="display: none; font-size: 13px;">Please choose
                        at least two</span>
                      <div class="row">
                        <div class="form-group mb-3 col-md-6">
                          <label class="css-1xujd68" for="salary">What is the minimum salary you would accept? <span
                              class="colo">*</span>
                          </label><br>
                          <input type="number" class="form-control" value="{{ old('salary', '') }}" name="salary"
                            required placeholder='&#xf044; E.g.:  20,000 SDG'>
                        </div>

                      </div>
                      <div class="form-group col-md-6 mb-3">
                        <label class="css-1xujd68" for="name">How many years of experience do you have? <span
                            class="colo">*</span></label>
                        <select class="form-select" aria-label="Default select example" required name="experience">
                          <option selected>choose your experience</option>
                          <option value="1" {{old('experience')=="1" ? 'selected' : '' }}>No experience</option>
                          <option value="2" {{old('experience')=="2" ? 'selected' : '' }}>less than one year Year
                          </option>
                          <option value="3" {{old('experience')=="3" ? 'selected' : '' }}>1 Year</option>
                          <option value="4" {{old('experience')=="4" ? 'selected' : '' }}>2 Year</option>
                          <option value="5" {{old('experience')=="5" ? 'selected' : '' }}>3 Year</option>
                          <option value="6" {{old('experience')=="6" ? 'selected' : '' }}>4 Year</option>
                          <option value="7" {{old('experience')=="7" ? 'selected' : '' }}>5 Year</option>
                          <option value="8" {{old('experience')=="8" ? 'selected' : '' }}>6 Year</option>
                          <option value="9" {{old('experience')=="9" ? 'selected' : '' }}>7 Year</option>
                          <option value="10" {{old('experience')=="10" ? 'selected' : '' }}>8 Year</option>
                          <option value="11" {{old('experience')=="11" ? 'selected' : '' }}>9 Year</option>
                          <option value="12" {{old('experience')=="12" ? 'selected' : '' }}>10 Year</option>
                          <option value="13" {{old('experience')=="13" ? 'selected' : '' }}>11 Year</option>
                          <option value="14" {{old('experience')=="14" ? 'selected' : '' }}>12 Year</option>
                          <option value="15" {{old('experience')=="15" ? 'selected' : '' }}>13 Year</option>
                          <option value="16" {{old('experience')=="16" ? 'selected' : '' }}>14 Year</option>
                          <option value="17" {{old('experience')=="17" ? 'selected' : '' }}>15 Year</option>
                          <option value="18" {{old('experience')=="18" ? 'selected' : '' }}>More than 15 Year</option>
                        </select>

                      </div>
                    </div>
                  </div>

                  <button type="button" name="next" class="next action-button">Next</button>
                  <button type="button" name="previous" class="previous action-button-previous">Previous</button>
                </fieldset>
                <fieldset>
                  <div class="form-card">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="fs-title">Educationa Information </h2>
                      </div>
                      <div class="col-5">
                        <h2 class="steps">Step 3 - 4</h2>
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <label> What's your current educational level? <span class="colo">*</span></label>
                      <select class="form-select" onchange="EducationSelected(this.selectedIndex)"
                        name="education_level_id" aria-label="Default select example" required>
                        <option value="Choose  Category ..." disabled selected hidden>Choose Education Level ...
                        </option>
                        @foreach($educationLevels as $educationLevel)
                        <option value="{{$educationLevel->id}}" {{old('education_level_id')==$educationLevel->id ?
                          'selected' : ''}}>{{$educationLevel->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="break" style="height: 20px; background-color:#fff; width: 100%"></div>
                  <div class="form-card" style="display:none;" id="bachelor">
                    <div class="row">
                      <h5 style="color: #093adc;">Add Bachelor's Information Degree</h5>
                      <div class="form-group col-md-6">
                        <label>University/Institution <span class="colo">*</span></label>
                        <input type="text" class="form-control" value="{{ old('university', '') }}" name="university"
                          required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Field of Study <span class="colo">*</span></label>
                        <input type="text" class="form-control" value="{{ old('field_of_study', '') }}"
                          name="field_of_study" required>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label>Start Year <span class="colo">*</span></label>
                          <input type="text" class="form-control" value="{{ old('start_year', '') }}" id="datepicker"
                            name="start_year" />
                        </div>
                        <div class="form-group col-md-6 mt-3 mt-md-0">
                          <label>End Year <span class="colo">*</span></label>
                          <input type="text" class="form-control" value="{{ old('end_year', '') }}" id="datepicker"
                            name="end_year" />
                        </div>
                        <small style="font-size: 15px;">If you're still studying, add your expected graduation
                          year.</small>
                      </div>
                      <br>
                      <label>Degree <span class="colo">*</span></label>
                      <div class="form-group col-md-6">
                        <div class="input-group">
                          <select class="custom-select" id="inputGroupSelect05" name="degree" required>
                            <option selected>Choose...</option>
                            <option value="A/Excellent/85% - 100%" {{old('degree')=="A/Excellent/85% - 100%"
                              ? 'selected' : '' }}>A/Excellent/85% - 100%</option>
                            <option value="B/Very good/75% - 85%" {{old('degree')=="B/Very good/75% - 85%" ? 'selected'
                              : '' }}>B/Very good/75% - 85%</option>
                            <option value="C/Good/65% - 75%" {{old('degree')=="C/Good/65% - 75%" ? 'selected' : '' }}>
                              C/Good/65% - 75%</option>
                            <option value="D/Fair/50% - 65%" {{old('degree')=="D/Fair/50% - 65%" ? 'selected' : '' }}>
                              D/Fair/50% - 65%</option>
                            <option value="Not specified" {{old('degree')=="Not specified" ? 'selected' : '' }}>Not
                              specified</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-card" style="display:none;" id="master">
                    <div class="row">
                      <h5 style="color: #093adc;">Add Bachelor's Information Degree</h5>
                      <div class="form-group col-md-6">
                        <label>University/Institution <span class="colo">*</span></label>
                        <input type="text" class="form-control" value="{{ old('degree_university', '') }}"
                          name="degree_university" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Field of Study <span class="colo">*</span></label>
                        <input type="text" class="form-control" value="{{ old('degree_field_of_study', '') }}"
                          name="degree_field_of_study" required>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label>Start Year <span class="colo">*</span></label>
                          <input type="text" class="form-control" value="{{ old('degree_start_year', '') }}"
                            id="datepicker" name="degree_start_year" />
                        </div>
                        <div class="form-group col-md-6 mt-3 mt-md-0">
                          <label>End Year <span class="colo">*</span></label>
                          <input type="text" class="form-control" value="{{ old('degree_end_year', '') }}"
                            id="datepicker" name="degree_end_year" />
                        </div>
                        <small style="font-size: 15px;">If you're still studying, add your expected graduation
                          year.</small>
                      </div>
                      <br>
                      <label>Degree <span class="colo">*</span></label>
                      <div class="form-group col-md-6">
                        <div class="input-group">
                          <select class="custom-select" id="inputGroupSelect05" name="degree_degree" required>
                            <option selected>Choose...</option>
                            <option value="A/Excellent/85% - 100%" {{old('degree_degree')=="A/Excellent/85% - 100%"
                              ? 'selected' : '' }}>A/Excellent/85% - 100%</option>
                            <option value="B/Very good/75% - 85%" {{old('degree_degree')=="B/Very good/75% - 85%"
                              ? 'selected' : '' }}>B/Very good/75% - 85%</option>
                            <option value="C/Good/65% - 75%" {{old('degree_degree')=="C/Good/65% - 75%" ? 'selected'
                              : '' }}>C/Good/65% - 75%</option>
                            <option value="D/Fair/50% - 65%" {{old('degree_degree')=="D/Fair/50% - 65%" ? 'selected'
                              : '' }}>D/Fair/50% - 65%</option>
                            <option value="Not specified" {{old('degree_degree')=="Not specified" ? 'selected' : '' }}>
                              Not specified</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <br><br>
                    <div class="row">
                      <h5 style="color: #093adc;">Add Master Degree Information</h5>
                      <div class="form-group col-md-6">
                        <label>University/Institution <span class="colo">*</span></label>
                        <input type="text" class="form-control" value="{{ old('master_university', '') }}"
                          name="master_university" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Field of Study <span class="colo">*</span></label>
                        <input type="text" class="form-control" value="{{ old('master_field_of_study', '') }}"
                          name="master_field_of_study" required>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label>Start Year <span class="colo">*</span></label>
                          <input type="text" class="form-control" value="{{ old('master_start_year', '') }}"
                            id="datepicker" name="master_start_year" />
                        </div>
                        <div class="form-group col-md-6 mt-3 mt-md-0">
                          <label>End Year <span class="colo">*</span></label>
                          <input type="text" class="form-control" value="{{ old('master_end_year', '') }}"
                            id="datepicker" name="master_end_year" />
                        </div>
                        <small style="font-size: 15px;">If you're still studying, add your expected graduation
                          year.</small>
                      </div>
                      <br>
                      <label>Degree <span class="colo">*</span></label>
                      <div class="form-group col-md-6">
                        <div class="input-group">
                          <select class="custom-select" id="inputGroupSelect05" name="master_degree" required>
                            <option selected>Choose...</option>
                            <option value="A/Excellent/85% - 100%" {{old('master_degree')=="A/Excellent/85% - 100%"
                              ? 'selected' : '' }}>A/Excellent/85% - 100%</option>
                            <option value="B/Very good/75% - 85%" {{old('master_degree')=="B/Very good/75% - 85%"
                              ? 'selected' : '' }}>B/Very good/75% - 85%</option>
                            <option value="C/Good/65% - 75%" {{old('master_degree')=="C/Good/65% - 75%" ? 'selected'
                              : '' }}>C/Good/65% - 75%</option>
                            <option value="D/Fair/50% - 65%" {{old('master_degree')=="D/Fair/50% - 65%" ? 'selected'
                              : '' }}>D/Fair/50% - 65%</option>
                            <option value="Not specified" {{old('master_degree')=="Not specified" ? 'selected' : '' }}>
                              Not specified</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-card " style="display:none;" id="doctorate">
                    <div class="row">
                      <h5 style="color: #093adc;">Add Bachelor's Information Degree</h5>
                      <div class="form-group col-md-6">
                        <label>University/Institution <span class="colo">*</span></label>
                        <input type="text" class="form-control" value="{{ old('doctorate_degree_university', '') }}"
                          name="doctorate_degree_university" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Field of Study <span class="colo">*</span></label>
                        <input type="text" class="form-control" value="{{ old('doctorate_degree_field_of_study', '') }}"
                          name="doctorate_degree_field_of_study" required>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label>Start Year <span class="colo">*</span></label>
                          <input type="text" class="form-control" value="{{ old('doctorate_degree_start_year', '') }}"
                            id="datepicker" name="doctorate_degree_start_year" />
                        </div>
                        <div class="form-group col-md-6 mt-3 mt-md-0">
                          <label>End Year <span class="colo">*</span></label>
                          <input type="text" class="form-control" value="{{ old('doctorate_degree_end_year', '') }}"
                            id="datepicker" name="doctorate_degree_end_year" />
                        </div>
                        <small style="font-size: 15px;">If you're still studying, add your expected graduation
                          year.</small>
                      </div>
                      <br>
                      <label>Degree <span class="colo">*</span></label>
                      <div class="form-group col-md-6">
                        <div class="input-group">
                          <select class="custom-select" id="inputGroupSelect05" name="doctorate_degree_degree" required>
                            <option selected>Choose...</option>
                            <option value="A/Excellent/85% - 100%"
                              {{old('doctorate_degree_degree')=="A/Excellent/85% - 100%" ? 'selected' : '' }}>
                              A/Excellent/85% - 100%</option>
                            <option value="B/Very good/75% - 85%"
                              {{old('doctorate_degree_degree')=="B/Very good/75% - 85%" ? 'selected' : '' }}>B/Very
                              good/75% - 85%</option>
                            <option value="C/Good/65% - 75%" {{old('doctorate_degree_degree')=="C/Good/65% - 75%"
                              ? 'selected' : '' }}>C/Good/65% - 75%</option>
                            <option value="D/Fair/50% - 65%" {{old('doctorate_degree_degree')=="D/Fair/50% - 65%"
                              ? 'selected' : '' }}>D/Fair/50% - 65%</option>
                            <option value="Not specified" {{old('doctorate_degree_degree')=="Not specified" ? 'selected'
                              : '' }}>Not specified</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <br><br>
                    <div class="row">
                      <h5 style="color: #093adc;">Add Master Degree Information</h5>
                      <div class="form-group col-md-6">
                        <label>University/Institution <span class="colo">*</span></label>
                        <input type="text" class="form-control" value="{{ old('doctorate_master_university', '') }}"
                          name="doctorate_master_university" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Field of Study <span class="colo">*</span></label>
                        <input type="text" class="form-control" value="{{ old('doctorate_master_field_of_study', '') }}"
                          name="doctorate_master_field_of_study" required>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label>Start Year <span class="colo">*</span></label>
                          <input type="text" class="form-control" value="{{ old('doctorate_master_start_year', '') }}"
                            id="datepicker" name="doctorate_master_start_year" />
                        </div>
                        <div class="form-group col-md-6 mt-3 mt-md-0">
                          <label>End Year <span class="colo">*</span></label>
                          <input type="text" class="form-control" value="{{ old('doctorate_master_end_year', '') }}"
                            id="datepicker" name="doctorate_master_end_year" />
                        </div>
                        <small style="font-size: 15px;">If you're still studying, add your expected graduation
                          year.</small>
                      </div>
                      <br>
                      <label>Degree <span class="colo">*</span></label>
                      <div class="form-group col-md-6">
                        <div class="input-group">
                          <select class="custom-select" id="inputGroupSelect05" name="doctorate_master_degree" required>
                            <option selected>Choose...</option>
                            <option value="A/Excellent/85% - 100%"
                              {{old('doctorate_master_degree')=="A/Excellent/85% - 100%" ? 'selected' : '' }}>
                              A/Excellent/85% - 100%</option>
                            <option value="B/Very good/75% - 85%"
                              {{old('doctorate_master_degree')=="B/Very good/75% - 85%" ? 'selected' : '' }}>B/Very
                              good/75% - 85%</option>
                            <option value="C/Good/65% - 75%" {{old('doctorate_master_degree')=="C/Good/65% - 75%"
                              ? 'selected' : '' }}>C/Good/65% - 75%</option>
                            <option value="D/Fair/50% - 65%" {{old('doctorate_master_degree')=="D/Fair/50% - 65%"
                              ? 'selected' : '' }}>D/Fair/50% - 65%</option>
                            <option value="Not specified" {{old('doctorate_master_degree')=="Not specified" ? 'selected'
                              : '' }}>Not specified</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <br><br>
                    <div class="row">
                      <h5 style="color: #093adc;">Add Doctorate Degree Information</h5>
                      <div class="form-group col-md-6">
                        <label>University/Institution <span class="colo">*</span></label>
                        <input type="text" class="form-control" value="{{ old('doctorate_university', '') }}"
                          name="doctorate_university" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Field of Study <span class="colo">*</span></label>
                        <input type="text" class="form-control" value="{{ old('doctorate_field_of_study', '') }}"
                          name="doctorate_field_of_study" required>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label>Start Year <span class="colo">*</span></label>
                          <input type="text" class="form-control" value="{{ old('doctorate_start_year', '') }}"
                            id="datepicker" name="doctorate_start_year" />
                        </div>
                        <div class="form-group col-md-6 mt-3 mt-md-0">
                          <label>End Year <span class="colo">*</span></label>
                          <input type="text" class="form-control" value="{{ old('doctorate_end_year', '') }}"
                            id="datepicker" name="doctorate_end_year" />
                        </div>
                        <small style="font-size: 15px;">If you're still studying, add your expected graduation
                          year.</small>
                      </div>
                      <br>
                      <label>Degree <span class="colo">*</span></label>
                      <div class="form-group col-md-6">
                        <div class="input-group">
                          <select class="custom-select" id="inputGroupSelect05" name="doctorate_degree" required>
                            <option selected>Choose...</option>
                            <option value="A/Excellent/85% - 100%" {{old('doctorate_degree')=="A/Excellent/85% - 100%"
                              ? 'selected' : '' }}>A/Excellent/85% - 100%</option>
                            <option value="B/Very good/75% - 85%" {{old('doctorate_degree')=="B/Very good/75% - 85%"
                              ? 'selected' : '' }}>B/Very good/75% - 85%</option>
                            <option value="C/Good/65% - 75%" {{old('doctorate_degree')=="C/Good/65% - 75%" ? 'selected'
                              : '' }}>C/Good/65% - 75%</option>
                            <option value="D/Fair/50% - 65%" {{old('doctorate_degree')=="D/Fair/50% - 65%" ? 'selected'
                              : '' }}>D/Fair/50% - 65%</option>
                            <option value="Not specified" {{old('doctorate_degree')=="Not specified" ? 'selected' : ''
                              }}>Not specified</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>&nbsp;
                  <button type="button" name="next" class="next action-button">Next</button>
                  <button type="button" name="previous" class="previous action-button-previous">Previous</button>
                </fieldset>
                <fieldset>
                  <div class="form-card">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="fs-title">Upload Your CV :</h2>
                      </div>
                      <div class="col-5">
                        <h2 class="steps">Step 4 - 4</h2>
                      </div>
                    </div> <br><br>
                    <label class="fieldlabels">Upload Your CV:</label>
                    <input type="file" name="cv" accept=".pdf,.docs">
                  </div>
                  <button type="submit" name="next" class="action-button">Save</button>
                  <button type="button" name="previous" class="previous action-button-previous">Previous</button>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    $(document).ready(function () {
              $('#country').on('change', function () {
                  var idCountry = this.value;
                  $("#city").html('');
                  $.ajax({
                      url: "{{url('/fetch-cities')}}",
                      type: "POST",
                      data: {
                          country_id: idCountry,
                          _token: '{{csrf_token()}}'
                      },
                      dataType: 'json',
                      success: function (result) {
                          $('#city').html('<option value="">Select State</option>');
                          $.each(result.cities, function (key, value) {
                              $("#city").append('<option value="' + value
                                  .id + '">' + value.name + '</option>');
                          });
                      }
                  });
              });

          const completeCategories = $('.completeCategories').filterMultiSelect({
              // displayed when no options are selected
              placeholderText: "select categories",
              // placeholder for search field
              filterText: "search for category",
              // Select All text

              selectAllText: "Select All",
              // determine if is case sensitive
              caseSensitive: false,

          });

          const completeJobTitles = $('.completeJobTitles').filterMultiSelect({
              // displayed when no options are selected
              placeholderText: "select Job Titles",
              // placeholder for search field
              filterText: "search for job title",
              // Select All text

              selectAllText: "Select All",
              // determine if is case sensitive
              caseSensitive: false,
          });
    });
  </script>
</main>
@endsection