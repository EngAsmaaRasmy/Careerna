@extends('layouts.base ' ,['title'=>'CAREERNA | Career info'])
@section("content")
    <!-- ======= Header ======= -->
    @include('layouts.employee-header')
    <!-- End Header -->


    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="modal fade" id="modalFormSkill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Skills </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body ">
                    <form action="{{ route('employee.addSkill') }}" method="post" role="form">
                      {{ csrf_field() }}
                      <div class="">
                        <div class="card">
                          <div class="card-body">
                            <input type="hidden" value="{{$employee->id}}" class="form-control" name="employee_id">
                            <div class="form-group">
                              <label>Skill Name <span class="colo">*</span></label>
                              <input type="text" class="form-control" required name="skill_name">
                            </div>
                            <div class="form-group">
                              <label>Proficiency <span class="colo">*</span></label>
                              <select name="proficiency" class="form-select">
                                <option slelected>Select ...</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                                <option value="Fluent">Fluent</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer d-block">
                          <button type="submit" class="btn btn-warning float-right" id="btnSave">Save</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="modalFormLanguage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Languages </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body ">
                    <form action="{{ route('employee.addLanguage') }}" method="post" role="form">
                      {{ csrf_field() }}
                      <div class="">
                        <div class="card">
                          <div class="card-body">
                            <input type="hidden" value="{{$employee->id}}" class="form-control" name="employee_id">
                            <div class="form-group">
                              <label>Language <span class="colo">*</span></label>
                              <input type="text" class="form-control" required name="language_name">
                            </div>
                            <div class="form-group">
                              <label>Proficiency <span class="colo">*</span></label>
                              <select name="proficiency" class="form-select">
                                <option slelected>Select ...</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                                <option value="Fluent">Fluent</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer d-block">
                          <button type="submit" class="btn btn-warning float-right" id="btnSave">Save</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
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
                        <div class="info">
                          <h3 style="color: #093adc">Skills</h3>
                            <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right" style="width: 100%">
                                <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                          <div>
                                            <div class="card">
                                              <div class="fs-title">
                                                @if(session('employee_token'))
                                                <h5>What skills, tools, technologies and fields of expertise do you have? <span class="css-teaycm e7oqu6k0">— Add up to 30</span></h5>
                                                @else
                                                <h5>skills, tools, technologies and fields of expertise</h5>
                                              @endif
                                              </div>
                                              <div class="card-body">
                                                @if ($skills->isNotEmpty())
                                                @foreach($skills as $skill) 
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
                                                              <div class="css-b86ayu">{{$skill->skill_name}}</div><div class="">
                                                                <div class="css-1wpyv9g e18pz6632"></div>
                                                                
                                                        </div><div class="css-1q8vkew">{{$skill->proficiency}}</div></div>
                                                 @endforeach
                                                 @endif
                                                <br>
                                                @if(session('employee_token'))
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormSkill">+
                                                  Add
                                                  Skill</button>
                                                  @endif
                                              </div>
                                            </div>
                                          </div>
                                </div>
                            </div>
                        </div>&nbsp;
                        <div class="break" style="height: 20px; background-color:#f7f8f9; width: 100%"></div>
                        <div class="info">
                          <h3 style="color: #093adc">Languages</h3>
                          <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right" style="width: 100%">
                            <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                              <div class="card">
                                <div class="fs-title">
                                  @if(session('employee_token'))
                                  <h5>What languages do you know? <span class="css-teaycm e7oqu6k0">— You can add more than one</span></h5>
                                @else
                                <h5>Languages</h5>

                                @endif
                                </div>
                                <div class="card-body">
                                  @if ($languages->isNotEmpty())
                                  @foreach($languages as $language) 
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
                                                <div class="css-b86ayu">{{$language->language_name}}</div><div class="">
                                                  <div class="css-1wpyv9g e18pz6632"></div>
                                                  
                                          </div><div class="css-1q8vkew">{{$language->proficiency}}</div></div>
                                  @endforeach
                                  @endif
                                  <br>
                                  @if(session('employee_token'))
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormLanguage">+
                                    Add
                                    Languages</button>
                                    @endif
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="section-title" data-aos="fade-up">
                </div>
            </div>
        </section><!-- End About Section -->
       

    </main><!-- End #main -->

@endsection