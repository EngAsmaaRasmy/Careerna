@extends('layouts.base ' ,['title'=>'CAREERNA | Career info'])
@section("content")
    <!-- ======= Header ======= -->
    @include('layouts.employee-header')
      <!-- End Header -->
    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
          @include('employee.add-experience')
            <div class="container">
                <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="">
                            <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                    <div class="content1 pt-4 pt-lg-0">
                                      <aside class="">
                                        <nav class="sidebar">
                                          <a class="sidebar__list-item {{ Request::is('employee/general-info/'.$employee->id) ? 'active' : '' }}" href="{{route('employee.show.generalInfo',[$employee->id])}}">General
                                            Information</a>
                                        <a class="sidebar__list-item {{ Request::is('employee/education-info/'.$employee->id) ? 'active' : '' }}" href="{{route('employee.show.educationInfo',[$employee->id])}}">Education</a>
                                        <a class="sidebar__list-item {{ Request::is('employee/career-info/'.$employee->id) ? 'active' : '' }}" href="{{route('employee.show.careerInfo',[$employee->id])}}">Career
                                            Interest</a>
                                            <a class="sidebar__list-item {{ Request::is('employee/skills-info/'.$employee->id) ? 'active' : '' }}" href="{{route('employee.show.skillsInfo',[$employee->id])}}">Skills and Languages
                                                </a>
                                                @if(session('employee_token'))
                                                <a class="sidebar__list-item {{ Request::is('employee/update-cv/'.$employee->id) ? 'active' : '' }}" href="{{route('employee.show.uploadCV',[$employee->id])}}">Upload CV</a>
                                                @endif
                                        </nav>
                                      </aside>
                                    </div>
                                </div>
                            </div>
                        </div>&nbsp;
                    </div>
                    <div class="col-md-8">
                      @include("alert.success")
                      @include("alert.error")
                      <form id="personal"  action="{{ route('employee.updateCareerInfo' , [$employee->id]) }}"
                        method="post">
                        {{ csrf_field() }}
                        @if(session('employee_token'))
                          <div class="info">
                            <h3 style="color: #093adc ">career Interest</h3>
                              <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                  <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                    
                                          <div class="row">
                                            <div class="form-group col-md-12 mb-5">
                                              <label class="css-1xujd68"  for="name">What is your current job search status? <span class="colo">*</span></label>
                                              <select class="form-select" aria-label="Default select example" required name="candidates_status">
                                                <option selected>choose your candidates’ status</option>
                                                <option value="1" {{ $employee->careerDetail->candidates_status == '1' ? 'selected' : ''}}> I am unemployed and desperate looking for a job</option>
                                                <option value="2" {{ $employee->careerDetail->candidates_status == '2' ? 'selected' : ''}}>I am actively looking for new jobs and opportunities</option>
                                                <option value="3" {{ $employee->careerDetail->candidates_status == '3' ? 'selected' : ''}}>I am happy where I am but don’t mind finding good opportunities</option>
                                                <option value="4" {{ $employee->careerDetail->candidates_status == '4' ? 'selected' : ''}}>I am only interested in very specific opportunities</option>
                                                <option value="5" {{ $employee->careerDetail->candidates_status == '5' ? 'selected' : ''}}>I am not looking for a job</option>
                                              </select>
                    
                                            </div>
                                            <div class="form-group mb-4">
                                              <label class="css-1xujd68"> What's your current Career level? <span class="colo">*</span></label>
                                              <br>
                                              <div class="row">
                                                @foreach($careerLevels as $careerLevel)
                                                <div class="col-md-3">
                                                <input {{$employee->careerDetail->career_level_id == $careerLevel->id  ? 'checked' : ''}}
                                                type="radio" class="btn-check" name="career_level_id[]" id="careerLevel{{$careerLevel->id}}" value="{{$careerLevel->id}}" autocomplete="off" />
                                                  <label style="font-size: 14px; display: flex; align-items: center; justify-content:center; width: 100%; height: 60px; border-radius: 0px;"
                                                  class="btn btn-secondary"  for="careerLevel{{$careerLevel->id}}" >
                                                      {{$careerLevel->name}}</label>
                                                </div>
                                                @endforeach  
                                              </div>
                                            </div>
                                            <div class="form-group mb-4">
                                              <label class="css-1xujd68" for="name">What type of job are you open to? <span class="colo">*</span> </label><br>
                                              <div class="row">
                                                @foreach($jobTypes as $jobType)
                                                <div class="col-md-3">
                                                  <input {{$employee->careerDetail->job_type_id == $jobType->id  ? 'checked' : ''}}
                                                  type="radio"  class="btn-check" name="job_type_id[]" id="jobType567{{$jobType->id}}" autocomplete="off" value="{{$jobType->id}}"> 
                                                  <label style="font-size: 14px; display: flex; align-items: center; justify-content:center; width: 100%; height: 40px;"
                                                  class="btn btn-secondary " for="jobType567{{$jobType->id }}">
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
                                              <select class="form-control jobTitles" id="jobTitles" multiple required name="jobTitles[]">
                                                @foreach($jobTitles as $id => $jobTitles)
                                                  <option value="{{ $id }}" {{ (in_array($id, old('jobTitles', [])) || $employee->jobTitles->contains($id)) ? 'selected' : '' }}>{{ $jobTitles }}</option>
                                              @endforeach
                                              </select>
                                            </div>
                                            <div class="col-md-12 form-group mb-3">
                                              <label class="css-1xujd68">What job categories are you interested in??
                                                <span class="css-teaycm e7oqu6k0">— Add at least 2</span></label>
                                                <br>
                                              <select class="form-control categories" multiple id="categories" required name="categories[]">
                                                @foreach($categories as $id => $categories)
                                                  <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || $employee->categories->contains($id)) ? 'selected' : '' }}>{{ $categories }}</option>
                                              @endforeach
                                              </select>
                                            </div>
                                          <div class="row">
                                            <div class="form-group mb-3 col-md-6">
                                              <label class="css-1xujd68" for="salary">What is the minimum salary you would accept? <span class="colo">*</span>
                                              </label><br>
                                              <input type="number" class="form-control" value="{{$employee->careerDetail->salary}}" name="salary" required placeholder='&#xf044; E.g.:  20,000 SDG'>
                                            </div>
                    
                                          </div>
                                            <div class="form-group col-md-6 mb-3">
                                              <label class="css-1xujd68"  for="name">How many years of experience do you have? <span class="colo">*</span></label>
                                              <select class="form-select" aria-label="Default select example" required name="experience">
                                                <option selected>choose your experience</option>
                                                <option value="1" {{ $employee->careerDetail->experience == '1' ? 'selected' : ''}}>No experience</option>
                                                <option value="2"
                                                {{ $employee->careerDetail->experience == '2' ? 'selected' : ''}}>less than one  Year</option>
                                                <option value="3" {{ $employee->careerDetail->experience == '3' ? 'selected' : ''}}>1 Year</option>
                                                <option value="4" {{ $employee->careerDetail->experience == '4' ? 'selected' : ''}}>2 Year</option>
                                                <option value="5" {{ $employee->careerDetail->experience == '5' ? 'selected' : ''}}>3 Year</option>
                                                <option value="6" {{ $employee->careerDetail->experience == '6' ? 'selected' : ''}}>4 Year</option>
                                                <option value="7" {{ $employee->careerDetail->experience == '7' ? 'selected' : ''}}>5 Year</option>
                                                <option value="8" {{ $employee->careerDetail->experience == '8' ? 'selected' : ''}}>6 Year</option>
                                                <option value="9" {{ $employee->careerDetail->experience == '9' ? 'selected' : ''}}>7 Year</option>
                                                <option value="10" {{ $employee->careerDetail->experience == '10' ? 'selected' : ''}}>8 Year</option>
                                                <option value="11" {{ $employee->careerDetail->experience == '11' ? 'selected' : ''}}>9 Year</option>
                                                <option value="12" {{ $employee->careerDetail->experience == '12' ? 'selected' : ''}}>10 Year</option>
                                                <option value="13" {{ $employee->careerDetail->experience == '13' ? 'selected' : ''}}>11 Year</option>
                                                <option value="14" {{ $employee->careerDetail->experience == '14' ? 'selected' : ''}}>12 Year</option>
                                                <option value="15" {{ $employee->careerDetail->experience == '15' ? 'selected' : ''}}>13 Year</option>
                                                <option value="16" {{ $employee->careerDetail->experience == '16' ? 'selected' : ''}}>14 Year</option>
                                                <option value="17" {{ $employee->careerDetail->experience == '17' ? 'selected' : ''}}>15 Year</option>
                                                <option value="18" {{ $employee->careerDetail->experience == '18' ? 'selected' : ''}}>More than 15 Year</option>
                                              </select>
                    
                                            </div>
                    
                                            <div>
                                              <div class="card mt-3">
                                                <div class="fs-title">
                                                  <h5 class="css-1xujd68">Work experiences/Activities?</h5>
                                                </div>
                                                <div class="card-body">
                                                  @if ($experiences->isNotEmpty())
                                                  @foreach($experiences as $experience) 
                                                  <div class=""style=" margin-bottom: 0px;
                                                                position: relative;
                                                                max-width: 540px;
                                                                width: 100%;
                                                                margin-bottom: 16px;
                                                                padding: 12px;
                                                                border: 1px solid rgb(235, 237, 240);
                                                                border-radius: 2px;
                                                                background-color: rgb(252, 252, 252);
                                                                ">
                                                                {{-- <div class="css-1g928l1 e18pz6630"><span><i size="16" class="collapsed-iteme__edit-icon css-b80bsd efou2fk0"><svg width="16" height="16" preserveAspectRatio="none" viewBox="0 0 24 24"><path fill="#808EA5" d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"></path></svg></i></span></div> --}}
                                                                <div class="css-b86ayu">{{$experience->job_title}} <span class="css-4opa4o">{{$experience->jobType->name}}</span></div>                                            
                                                          <div class="css-1yp4yxl">{{$experience->company_name}}</div>
                                                          <div class="css-an5px">{{$experience->start_month}}, {{$experience->start_year}} -
                                                            @if($experience->end_year != 'End Year')
                                                            {{$experience->end_month}}, {{$experience->end_year}}
                                                          @else
                                                          Still work here
                                                          @endif</div></div>
                                                  @endforeach
                                                  @endif
                                                  <br>
                                                  @if(session('employee_token'))
                                                  <button type="button" class="btn btn-primary" data-toggle="modal" href="#modalFormHigh{{$employee->id}}" data-target="#modalFormHigh{{$employee->id}}">+
                                                    Add
                                                    Experience/Activity</button>
                                                    @endif
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                  </div>
                              </div>
                          </div>&nbsp;
                          
                          <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-3">Save</button>
                          </div>
                      </form>
                        @else
                        <div class="info">
                          <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                              <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                  <h3 style="color: #093adc ">Career Information</h3>

                                  <div class="content1 pt-4 pt-lg-0">
                                          <div>
                                              <span class="spanStyle">candidates’ status:</span>
                                              @if ($employee->careerDetail->experience == '1')
                                            <span class="css-1xujd69">I am unemployed and desperate looking for a job</span>
                                            @elseif($employee->careerDetail->candidates_status == '2')
                                            <span class="css-1xujd69">I am actively looking for new jobs and opportunities</span>
                                            @elseif($employee->careerDetail->candidates_status == '3')
                                            <span class="css-1xujd69">I am happy where I am but don’t mind finding good opportunities</span>
                                            @elseif($employee->careerDetail->candidates_status == '4')
                                            <span class="css-1xujd69">I am only interested in very specific opportunities</span>
                                            @elseif($employee->careerDetail->candidates_status == '5')
                                            <span class="css-1xujd69">I am not looking for a job</span>   
                                            @endif
                                              
                                          </div>
                                          <div>
                                              <span class="spanStyle">Current Career level? :</span>
                                              <span class="css-1xujd69">{{$careerDetails->careerLevel->name}}</span>
                                          </div>
                                          <div>
                                              <span class="spanStyle">type of job :</span>
                                              <span class="css-1xujd69">{{$careerDetails->jobType->name}}</span>
                                          </div>
                                          <div>
                                              <span class="spanStyle">Job Titles:</span>
                                              @foreach ($employee->jobTitles as $jobTitle)
                                              <span class="css-1xujd69">{{$jobTitle->name}}, </span>  
                                              @endforeach
                                              
                                          </div>
                                          <div>
                                              <span class="spanStyle"> Categories:</span>
                                              @foreach ($employee->categories as $category)
                                              <span class="css-1xujd69">{{$category->name}},</span>
                                              @endforeach
                                              
                                          </div>
                                          <div>
                                              <span class="spanStyle">Expected Salary :</span>
                                              <span class="css-1xujd69">{{$employee->careerDetail->salary}}</span>
                                          </div>
                                          <div>
                                            <span class="spanStyle">Experiences :</span>
                                            @if ($employee->careerDetail->experience == '1')
                                              <span class="css-1xujd69">No experience</span>
                                              @elseif($employee->careerDetail->experience == '2')
                                              <span class="css-1xujd69">Less than one year </span>
                                              @elseif($employee->careerDetail->experience == '3')
                                              <span class="css-1xujd69">1 Year</span>
                                              @elseif($employee->careerDetail->experience == '4')
                                              <span class="css-1xujd69">2 Year</span>
                                              @elseif($employee->careerDetail->experience == '5')
                                              <span class="css-1xujd69">3 Year</span>  
                                              @elseif($employee->careerDetail->experience == '6')
                                              <span class="css-1xujd69">4 Year</span> 
                                              @elseif($employee->careerDetail->experience == '7')
                                              <span class="css-1xujd69">5 Year</span> 
                                              @elseif($employee->careerDetail->experience == '8')
                                              <span class="css-1xujd69">6Year</span> 
                                              @elseif($employee->careerDetail->experience == '9')
                                              <span class="css-1xujd69">7 Year</span> 
                                              @elseif($employee->careerDetail->experience == '10')
                                              <span class="css-1xujd69">8 Year</span>
                                              @elseif($employee->careerDetail->experience == '11')
                                              <span class="css-1xujd69">9 Year</span> 
                                              @elseif($employee->careerDetail->experience == '12')
                                              <span class="css-1xujd69">10 Year</span> 
                                              @elseif($employee->careerDetail->experience == '13')
                                              <span class="css-1xujd69">11 Year</span>
                                              @elseif($employee->careerDetail->experience == '14')
                                              <span class="css-1xujd69">12 Year</span>
                                              @elseif($employee->careerDetail->experience == '15')
                                              <span class="css-1xujd69">13 Year</span>
                                              @elseif($employee->careerDetail->experience == '17')
                                              <span class="css-1xujd69">14 Year</span>
                                              @elseif($employee->careerDetail->experience == '18')
                                              <span class="css-1xujd69">15 Year</span>
                                              @elseif($employee->careerDetail->experience == '19')
                                              <span class="css-1xujd69">More than 15
                                                 Year</span> 
                                              @endif
                                            
                                        </div>
                                        <br>
                                        <div>
                                          <div class="card mt-3">
                                            <div class="fs-title">
                                              <h5 class="css-1xujd68">Work experiences/Activities</h5>
                                            </div>
                                            <div class="card-body">
                                              @if ($experiences->isNotEmpty())
                                              @foreach($experiences as $experience) 
                                              <div class=""style=" margin-bottom: 0px;
                                                            position: relative;
                                                            max-width: 540px;
                                                            width: 100%;
                                                            margin-bottom: 16px;
                                                            padding: 12px;
                                                            border: 1px solid rgb(235, 237, 240);
                                                            border-radius: 2px;
                                                            background-color: rgb(252, 252, 252);
                                                            ">
                                                            {{-- <div class="css-1g928l1 e18pz6630"><span><i size="16" class="collapsed-iteme__edit-icon css-b80bsd efou2fk0"><svg width="16" height="16" preserveAspectRatio="none" viewBox="0 0 24 24"><path fill="#808EA5" d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"></path></svg></i></span></div> --}}
                                                            <div class="css-b86ayu">{{$experience->job_title}} <span class="css-4opa4o">{{$experience->jobType->name}}</span></div>                                            
                                                      <div class="css-1yp4yxl">{{$experience->company_name}}</div>
                                                      <div class="css-an5px">{{$experience->start_month}}, {{$experience->start_year}} -
                                                        @if($experience->end_year != 'End Year')
                                                        {{$experience->end_month}}, {{$experience->end_year}}
                                                      @else
                                                      Still work here
                                                      @endif</div></div>
                                              @endforeach
                                              @endif
                                              <br>
                                            </div>
                                          </div>
                                        </div>
                                  </div>
                              </div>
                          </div>
                        </div>&nbsp;
                        @endif
                    </div>
                </div>
                <div class="section-title" data-aos="fade-up">
                </div>
            </div>
        </section><!-- End About Section -->
        <script>
        $(document).ready(function () {
            const categories = $('.categories').filterMultiSelect({
              // displayed when no options are selected
              placeholderText: "select categories",
              // placeholder for search field
              filterText: "search for category",
              // Select All text

              selectAllText: "Select All",
              // determine if is case sensitive
              caseSensitive: false,

          });
          const jobTitles = $('.jobTitles').filterMultiSelect({
              // displayed when no options are selected
              placeholderText: "select job titles",
              // placeholder for search field
              filterText: "search for job title",
              // Select All text

              selectAllText: "Select All",
              // determine if is case sensitive
              caseSensitive: false,

          });
        });
        </script>
    </main><!-- End #main -->
@endsection

 