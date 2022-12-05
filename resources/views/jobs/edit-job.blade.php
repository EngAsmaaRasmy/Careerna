@extends('layouts.base ' ,['title'=>'CAREERNA | Edit: '.$job->title])
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
                            <form id="msform" action="{{ route('site-jobs.update', [$job->id]) }}" method="post" role="form" 
                                class="php-email-form" enctype="multipart/form-data" >
                                {{ method_field('PATCH') }}
                                {{csrf_field() }}
                                <fieldset>
                                    <div class="form-card">
                                        <div class="form-group mt-3">
                                            <h3>Job Details</h3>
                                            <input type="hidden" value="{{$employer->id}}" class="form-control" name="employer_id">
                                            <label for="name">Job Title <span class="colo">*</span></label>
                                            <input type="text" class="form-control" name="title" required
                                              value="{{$job->title}}"  placeholder='&#xf044;'>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="name">Job Type <span class="colo">*</span> </label><br>
                                            <div class="row">
                                              @foreach($jobTypes as $jobType)
                                              <div class="col-md-3">
                                                <input type="radio" 
                                                {{$job->job_type_id == $jobType->id  ? 'checked' : ''}} class="btn-check" name="job_type_id[]" id="jobType{{$jobType->id}}" autocomplete="off" 
                                                value="{{$jobType->id}}"> 
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
                                                <option value="{{$category->id}}" {{$job->category_id == $category->id  ? 'selected' : ''}}>{{$category->name}}</option>
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
                                                    <input type="radio" 
                                                    {{$job->career_level_id == $careerLevel->id  ? 'checked' : ''}}
                                                    class="btn-check" name="career_level_id[]" id="careerLevel{{$careerLevel->id}}" value="{{$careerLevel->id}}" autocomplete="off" />
                                                    <label class="btn btn-secondary" style="display: flex; align-items: center; justify-content:center;" for="careerLevel{{$careerLevel->id}}" >
                                                        {{$careerLevel->name}}</label>
                                                    </div>
                                                    @endforeach
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="name">Job Location <span class="colo">*</span></label>
                                            <input type="text" class="form-control" name="location" required
                                              value="{{$job->location}}"  placeholder='&#xf044;'>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label  for="name">How many years of experience? <span class="colo">*</span></label>
                                            <select class="form-select" aria-label="Default select example" required name="experience">
                                              <option selected>choose your experience</option>
                                              <option value="No experience" {{ $job->experience == 'No experience' ? 'selected' : ''}}>No experience</option>
                                              <option value="less than one year Year"
                                              {{ $job->experience == 'less than one year Year' ? 'selected' : ''}}>less than one year Year</option>
                                              <option value="1 Year" {{ $job->experience == '1 Year' ? 'selected' : ''}}>1 Year</option>
                                              <option value="2 Year" {{ $job->experience == '2 Year' ? 'selected' : ''}}>2 Year</option>
                                              <option value="3 Year" {{ $job->experience == '3 Year' ? 'selected' : ''}}>3 Year</option>
                                              <option value="4 Year" {{ $job->experience == '4 Year' ? 'selected' : ''}}>4 Year</option>
                                              <option value="5 Year" {{ $job->experience == '5 Year' ? 'selected' : ''}}>5 Year</option>
                                              <option value="6 Year" {{ $job->experience == '6 Year' ? 'selected' : ''}}>6 Year</option>
                                              <option value="7 Year" {{ $job->experience == '7 Year' ? 'selected' : ''}}>7 Year</option>
                                              <option value="8 Year" {{ $job->experience == '8 Year' ? 'selected' : ''}}>8 Year</option>
                                              <option value="9 Year" {{ $job->experience == '9 Year' ? 'selected' : ''}}>9 Year</option>
                                              <option value="10 Year" {{ $job->experience == '10 Year' ? 'selected' : ''}}>10 Year</option>
                                              <option value="11 Year" {{ $job->experience == '11 Year' ? 'selected' : ''}}>11 Year</option>
                                              <option value="12 Year" {{ $job->experience == '12 Year' ? 'selected' : ''}}>12 Year</option>
                                              <option value="13 Year" {{ $job->experience == '13 Year' ? 'selected' : ''}}>13 Year</option>
                                              <option value="14 Year" {{ $job->experience == '14 Year' ? 'selected' : ''}}>14 Year</option>
                                              <option value="15 Year" {{ $job->experience == '15 Year' ? 'selected' : ''}}>15 Year</option>
                                              <option value="More than 15 Year" {{ $job->experience == 'More than 15 Year' ? 'selected' : ''}}>More than 15 Year</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                                <div class="form-group mt-3">
                                                    <label for="name"> Salary <small>(optional)</small></label>
                                                    <input type="text" class="form-control" name="salary"
                                                        placeholder='&#xf044;' value="{{$job->salary}}">
                                                </div>
                                        </div>  
                                        <div class="form-group mt-3">
                                            <label for="name">Number of Vacancies <span class="colo">*</span></label>
                                            <br>
                                            <form class="forms">
                                                <div class="value-button" id="decrease" onclick="decreaseValue()"
                                                    value="Decrease Value">-</div>
                                                <input type="number" name="vacancies" id="number" value="{{$job->vacancies}}" />
                                                <div class="value-button" id="increase" onclick="increaseValue()"
                                                    value="Increase Value">+</div>
                                            </form>
                                        </div>
                                        <h3>About The Job</h3>
                                        <div class="form-group mt-3">
                                            <label for="name">Job Description </label>
                                            <br>
                                            <textarea class="ckeditor form-control" name="description">{{$job->description}}</textarea>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="name">Job Requirements </label>
                                            <br>
                                            <textarea class="ckeditor form-control" name="requirements">{{$job->requirements}}</textarea>
                                        </div>
                                    </div><br>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Edit Job</button>
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
        