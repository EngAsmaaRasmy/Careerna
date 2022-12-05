@extends('layouts.base ' ,['title'=>'CAREERNA | Post A new Job'])
@section("content")
    <!-- ======= Header ======= -->
    @include('layouts.employer-header')
    <!-- End Header -->
    <main id="main">
        <section id="contact" class="contact ">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-11 col-sm-9 col-md-7 col-lg-7 col-xl-7 text-center p-0 mt-3 mb-2">
                        @include("alert.success")
                        @include("alert.error")
                        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                            <form id="msform" action="{{ route('site-jobs.store') }}" method="post" role="form" class="php-email-form" enctype="multipart/form-data" >
                                {{csrf_field() }}
                                <fieldset>
                                    <div class="form-card">
                                        <div class="form-group mt-3">
                                            <h3>Job Details</h3>
                                            <input type="hidden" value="{{$employer->id}}" class="form-control" name="employer_id">
                                            <label for="name">Job Title <span class="colo">*</span></label>
                                            <input type="text" class="form-control @error("title") is-invalid @enderror" value="{{ old('title', '') }}" name="title" required
                                                placeholder='&#xf044;'>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="name">Job Type <span class="colo">*</span> </label><br>
                                            <div class="row">
                                              @foreach($jobTypes as $jobType)
                                              <div class="col-md-3">
                                                <input {{ in_array($jobType->id, old('job_type_id', [])) ? 'checked' : '' }}
                                                 type="radio" required class="btn-check" name="job_type_id[]" id="jobType{{$jobType->id}}" autocomplete="off" value="{{$jobType->id}}"> 
                                                <label style="font-size: 14px; display: flex; align-items: center; justify-content:center; width: 100%; height: 40px;"
                                                 class="btn btn-secondary " for="jobType{{$jobType->id }}">
                                                    {{$jobType->name}}
                                                    <i class="fa fa-check"></i>
                                                </label> 
                                              </div>
                                              @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="name">Category <span class="colo">*</span></label>
                                            <select class="form-select" name="category_id" aria-label="Default select example" required>
                                                <option value="Choose  Category ..."disabled selected hidden>Choose Category ...</option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{old('category_id') == $category->id  ? 'selected' : ''}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mt-4">
                                            <label> Career level <span class="colo">*</span> </label>
                                            <br>
                                            <div class="btn-group">
                                                <div class="row">
                                                    @foreach($careerLevels as $careerLevel)
                                                    <div class="col-md-4">
                                                    <input {{ in_array($careerLevel->id, old('career_level_id', [])) ? 'checked' : '' }}
                                                     required type="radio" class="btn-check" name="career_level_id[]" id="careerLevel{{$careerLevel->id}}" value="{{$careerLevel->id}}" autocomplete="off" />
                                                    <label class="btn btn-secondary" style="display: flex; align-items: center; justify-content:center;" for="careerLevel{{$careerLevel->id}}" >
                                                        {{$careerLevel->name}}</label>
                                                    </div>
                                                    @endforeach
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="name">Job Location <span class="colo">*</span></label>
                                            <input type="text" class="form-control @error("location") is-invalid @enderror" value="{{ old('location', '') }}" name="location" required
                                                placeholder='&#xf044;'>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label  for="name">How many years of experience? <span class="colo">*</span></label>
                                            <select class="form-select" aria-label="Default select example" required name="experience">
                                              <option selected>choose  experience</option>
                                              <option value="1" {{old('experience') == "1"  ? 'selected' : ''}}>No experience</option>
                                              <option value="2" {{old('experience') == "2"  ? 'selected' : ''}}>less than one year Year</option>
                                              <option value="3" {{old('experience') == "3"  ? 'selected' : ''}}>1 Year</option>
                                              <option value="4" {{old('experience') == "4"  ? 'selected' : ''}}>2 Year</option>
                                              <option value="5" {{old('experience') == "5"  ? 'selected' : ''}}>3 Year</option>
                                              <option value="6" {{old('experience') == "6"  ? 'selected' : ''}}>4 Year</option>
                                              <option value="7" {{old('experience') == "7"  ? 'selected' : ''}}>5 Year</option>
                                              <option value="8" {{old('experience') == "8"  ? 'selected' : ''}}>6 Year</option>
                                              <option value="9" {{old('experience') == "9"  ? 'selected' : ''}}>7 Year</option>
                                              <option value="10" {{old('experience') == "10"  ? 'selected' : ''}}>8 Year</option>
                                              <option value="11" {{old('experience') == "11"  ? 'selected' : ''}}>9 Year</option>
                                              <option value="12" {{old('experience') == "12"  ? 'selected' : ''}}>10 Year</option>
                                              <option value="13" {{old('experience') == "13"  ? 'selected' : ''}}>11 Year</option>
                                              <option value="14" {{old('experience') == "14"  ? 'selected' : ''}}>12 Year</option>
                                              <option value="15" {{old('experience') == "15"  ? 'selected' : ''}}>13 Year</option>
                                              <option value="16" {{old('experience') == "16"  ? 'selected' : ''}}>14 Year</option>
                                              <option value="17" {{old('experience') == "17"  ? 'selected' : ''}}>15 Year</option>
                                              <option value="18" {{old('experience') == "18"  ? 'selected' : ''}}>More than 15 Year</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                                <div class="form-group mt-3">
                                                    <label for="name"> Salary <small>(optional)</small></label>
                                                    <input type="text" class="form-control @error("salary") is-invalid @enderror" value="{{ old('salary', '') }}" name="salary"
                                                        placeholder='&#xf044;'>
                                                </div>
                                        </div>  
                                        <div class="form-group mt-3">
                                            <label for="name">Number of Vacancies <span class="colo">*</span></label>
                                            <br>
                                            <form class="forms">
                                                <div class="value-button" id="decrease" onclick="decreaseValue()"
                                                    value="Decrease Value">-</div>
                                                <input type="number" id="number" value="0" {{ old('vacancies', '') }} name="vacancies" min="1" max="1000" />
                                                <div class="value-button" id="increase" onclick="increaseValue()"
                                                    value="Increase Value">+</div>
                                            </form>
                                        </div>
                                        <h3>About The Job</h3>
                                        <div class="form-group mt-3">
                                            <label for="name">Job Description </label>
                                            <br>
                                            <textarea class="ckeditor form-control @error("description") is-invalid @enderror" value="{{ old('description', '') }}" name="description"></textarea>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="name">Job Requirements </label>
                                            <br>
                                            <textarea class="ckeditor form-control @error("requirements") is-invalid @enderror"  value="{{ old('requirements', '') }}" name="requirements"></textarea>
                                        </div>
                                    </div><br>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Post</button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script src="{{ asset('assets/js/myScript.js')}}"></script>
        <script type='text/javascript'
            src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'>
        </script>
    </main>
@endsection
        