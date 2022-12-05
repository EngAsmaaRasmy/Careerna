@extends('layouts.base ' ,['title'=>'CAREERNA | Education info'])
@section("content")
@include('layouts.employee-header')
<!-- End Header -->
    <main id="main">
        <section id="about" class="about section-bg">
            <div class="container">
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
                        </div>&nbsp;&nbsp;
                    </div>
                    <div class="col-md-8">
                          <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                              <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                  <div class="content1 pt-4 pt-lg-0">
                                    <form id="personal"  action="{{ route('employee.updateEducationInfo' , [$employee->id]) }}"
                                      method="post">
                                      {{ csrf_field() }}
                                    <div class="info">
                                      <h3 style="color: #093adc">Education Information</h3>
                                      <div class="row">
                                        @if(session('employee_token'))
                                          <label class="css-1xujd68"> What's your current educational level? <span class="colo">*</span></label>
                                          <select class="form-select" onchange="EducationSelectedDegree(this.selectedIndex)"  name="education_level_id" aria-label="Default select example" required>
                                            @foreach($educationLevels as $educationLevel)
                                            <option value="{{$educationLevel->id}}" {{$employee->education_level_id == $educationLevel->id  ? 'selected' : ''}}>{{$educationLevel->name}}</option>
                                            @endforeach
                                        </select>
                                        @else
                                        <div>
                                          <span class="spanStyle">Education Level  :</span>
                                          <span class="css-1xujd69">{{$employee->educationLevel->name}}</span>
                                      </div>
                                      <style>
                                        .content1 span {
                                            font-size: 1rem !important;
                                        }
                                    </style>
                                        @endif
                                      </div>
                                      <br><br>
                                    </div>&nbsp;
                                    @if(session('employee_token'))
                                    <div class="info" id="bachelor" style="{{ $employee->education_level_id == 1 ? 'display: block' : 'display: none'}}">
                                      @if ($bachelor)
                                      <div class="row" >
                                        <h5 style="color: #093adc;"> Bachelor's Information Degree</h5>
                                        <div class="form-group col-md-6">
                                          <label>University/Institution <span class="colo">*</span></label>
                                          <input type="text" class="form-control" name="university" value="{{$bachelor->university}}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label>Field of Study <span class="colo">*</span></label>
                                          <input type="text" class="form-control" name="field_of_study" value="{{$bachelor->field_of_study}}" required>
                                        </div>
                                        <div class="row">
                                          <div class="form-group col-md-6">
                                            <label>Start Year <span class="colo">*</span></label>
                                            <input type="text"  class="form-control" id="datepicker" value="{{$bachelor->start_year}}" name="start_year"/>
                                          </div>
                                          <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <label>End Year <span class="colo">*</span></label>
                                            <input type="text"  class="form-control" id="datepicker" value="{{$bachelor->end_year}}" name="end_year"/>
                                          </div>
                                          <small style="font-size: 15px;">If you're still studying, add your expected graduation year.</small>
                                        </div>
                                        <br>
                                        <label>Degree <span class="colo">*</span></label>
                                        <div class="form-group col-md-6">
                                          <div class="input-group">
                                            <select class="custom-select" id="inputGroupSelect05" name="degree" required>
                                              <option selected>Choose...</option>
                                              <option value="A/Excellent/85% - 100%" {{ $bachelor->degree == 'A/Excellent/85% - 100%' ? 'selected' : ''}}>A/Excellent/85% - 100%</option>
                                              <option value="B/Very good/75% - 85%" {{ $bachelor->degree == 'B/Very good/75% - 85%' ? 'selected' : ''}}>B/Very good/75% - 85%</option>
                                              <option value="C/Good/65% - 75%" {{ $bachelor->degree == 'C/Good/65% - 75%' ? 'selected' : ''}}>C/Good/65% - 75%</option>
                                              <option value="D/Fair/50% - 65%" {{ $bachelor->degree == 'D/Fair/50% - 65%' ? 'selected' : ''}}>D/Fair/50% - 65%</option>
                                              <option value="Not specified" {{ $bachelor->degree == 'Not specified' ? 'selected' : ''}}>Not specified</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      @else
                                      <div class="row"  >
                                        <h5 style="color: #093adc;">Add Bachelor's Information Degree</h5>
                                        <div class="form-group col-md-6">
                                          <label>University/Institution <span class="colo">*</span></label>
                                          <input type="text" class="form-control" name="university" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label>Field of Study <span class="colo">*</span></label>
                                          <input type="text" class="form-control" name="field_of_study" required>
                                        </div>
                                        <div class="row">
                                          <div class="form-group col-md-6">
                                            <label>Start Year <span class="colo">*</span></label>
                                            <input type="text"  class="form-control" id="datepicker" name="start_year"/>
                                          </div>
                                          <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <label>End Year <span class="colo">*</span></label>
                                            <input type="text"  class="form-control" id="datepicker" name="end_year"/>
                                          </div>
                                          <small style="font-size: 15px;">If you're still studying, add your expected graduation year.</small>
                                        </div>
                                        <br>
                                        <label>Degree <span class="colo">*</span></label>
                                        <div class="form-group col-md-6">
                                          <div class="input-group">
                                            <select class="custom-select" id="inputGroupSelect05" name="degree" required>
                                              <option selected>Choose...</option>
                                              <option value="A/Excellent/85% - 100%">A/Excellent/85% - 100%</option>
                                              <option value="B/Very good/75% - 85%">B/Very good/75% - 85%</option>
                                              <option value="C/Good/65% - 75%">C/Good/65% - 75%</option>
                                              <option value="D/Fair/50% - 65%">D/Fair/50% - 65%</option>
                                              <option value="Not specified">Not specified</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      @endif
                                    </div>&nbsp;
                                     <div class="info"  id="master" style="{{ $employee->education_level_id == 2 ? 'display: block' : 'display: none'}}"> 
                                      @if ($bachelor)
                                      <div class="row">
                                              <h5 style="color: #093adc;"> Bachelor's Information Degree</h5>
                                              <div class="form-group col-md-6">
                                                <label>University/Institution <span class="colo">*</span></label>
                                                <input type="text" class="form-control" name="degree_university" value="{{$bachelor->university}}" required>
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label>Field of Study <span class="colo">*</span></label>
                                                <input type="text" class="form-control" name="degree_field_of_study" value="{{$bachelor->field_of_study}}" required>
                                              </div>
                                              <div class="row">
                                                <div class="form-group col-md-6">
                                                  <label>Start Year <span class="colo">*</span></label>
                                                  <input type="text"  class="form-control" id="datepicker"value="{{$bachelor->start_year}}" name="degree_start_year"/>
                                                </div>
                                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                                  <label>End Year <span class="colo">*</span></label>
                                                  <input type="text"  class="form-control" id="datepicker" value="{{$bachelor->end_year}}" name="degree_end_year"/>
                                                </div>
                                                <small style="font-size: 15px;">If you're still studying, add your expected graduation year.</small>
                                              </div>
                                              <br>
                                              <label>Degree <span class="colo">*</span></label>
                                              <div class="form-group col-md-6">
                                                <div class="input-group">
                                                  <select class="custom-select" id="inputGroupSelect05" name="degree_degree" required>
                                                    <option selected>Choose...</option>
                                                    <option value="A/Excellent/85% - 100%" {{ $bachelor->degree == 'A/Excellent/85% - 100%' ? 'selected' : ''}}>A/Excellent/85% - 100%</option>
                                                    <option value="B/Very good/75% - 85%" {{ $bachelor->degree == 'B/Very good/75% - 85%' ? 'selected' : ''}}>B/Very good/75% - 85%</option>
                                                    <option value="C/Good/65% - 75%" {{ $bachelor->degree == 'C/Good/65% - 75%' ? 'selected' : ''}}>C/Good/65% - 75%</option>
                                                    <option value="D/Fair/50% - 65%" {{ $bachelor->degree == 'D/Fair/50% - 65%' ? 'selected' : ''}}>D/Fair/50% - 65%</option>
                                                    <option value="Not specified" {{ $bachelor->degree == 'Not specified' ? 'selected' : ''}}>Not specified</option>
                                                  </select>
                                                </div>
                                              </div>
                                      </div>
                                      @else
                                      <div class="row">
                                        <h5 style="color: #093adc;">Add Bachelor's Information Degree</h5>
                                        <div class="form-group col-md-6">
                                          <label>University/Institution <span class="colo">*</span></label>
                                          <input type="text" class="form-control" name="degree_university" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label>Field of Study <span class="colo">*</span></label>
                                          <input type="text" class="form-control" name="degree_field_of_study" required>
                                        </div>
                                        <div class="row">
                                          <div class="form-group col-md-6">
                                            <label>Start Year <span class="colo">*</span></label>
                                            <input type="text"  class="form-control" id="datepicker" name="degree_start_year"/>
                                          </div>
                                          <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <label>End Year <span class="colo">*</span></label>
                                            <input type="text"  class="form-control" id="datepicker" name="degree_end_year"/>
                                          </div>
                                          <small style="font-size: 15px;">If you're still studying, add your expected graduation year.</small>
                                        </div>
                                        <br>
                                        <label>Degree <span class="colo">*</span></label>
                                        <div class="form-group col-md-6">
                                          <div class="input-group">
                                            <select class="custom-select" id="inputGroupSelect05" name="degree_degree" required>
                                              <option selected>Choose...</option>
                                              <option value="A/Excellent/85% - 100%">A/Excellent/85% - 100%</option>
                                              <option value="B/Very good/75% - 85%">B/Very good/75% - 85%</option>
                                              <option value="C/Good/65% - 75%">C/Good/65% - 75%</option>
                                              <option value="D/Fair/50% - 65%">D/Fair/50% - 65%</option>
                                              <option value="Not specified">Not specified</option>
                                            </select>
                                          </div>
                                        </div>
                                     </div>
                                      @endif
                                      <br><br>
                                      @if ($master)
                                      <div class="row">
                                          <h5 style="color: #093adc;"> Master Degree Information</h5>
                                          <div class="form-group col-md-6">
                                            <label>University/Institution <span class="colo">*</span></label>
                                            <input type="text" class="form-control" value="{{$master->university}}" name="master_university" required>
                                          </div>
                                          <div class="form-group col-md-6">
                                            <label>Field of Study <span class="colo">*</span></label>
                                            <input type="text" class="form-control" value="{{$master->field_of_study}}" name="master_field_of_study" required>
                                          </div>
                                          <div class="row">
                                            <div class="form-group col-md-6">
                                              <label>Start Year <span class="colo">*</span></label>
                                              <input type="text"  class="form-control" id="datepicker" value="{{$master->start_year}}" name="master_start_year"/>
                                            </div>
                                            <div class="form-group col-md-6 mt-3 mt-md-0">
                                              <label>End Year <span class="colo">*</span></label>
                                              <input type="text"  class="form-control" id="datepicker" value="{{$master->end_year}}" name="master_end_year"/>
                                            </div>
                                            <small style="font-size: 15px;">If you're still studying, add your expected graduation year.</small>
                                          </div>
                                          <br>
                                          <label>Degree <span class="colo">*</span></label>
                                          <div class="form-group col-md-6">
                                            <div class="input-group">
                                              <select class="custom-select" id="inputGroupSelect05" name="master_degree" required>
                                                <option selected>Choose...</option>
                                                <option value="A/Excellent/85% - 100%" {{ $bachelor->degree == 'A/Excellent/85% - 100%' ? 'selected' : ''}}>A/Excellent/85% - 100%</option>
                                                <option value="B/Very good/75% - 85%" {{ $bachelor->degree == 'B/Very good/75% - 85%' ? 'selected' : ''}}>B/Very good/75% - 85%</option>
                                                <option value="C/Good/65% - 75%" {{ $bachelor->degree == 'C/Good/65% - 75%' ? 'selected' : ''}}>C/Good/65% - 75%</option>
                                                <option value="D/Fair/50% - 65%" {{ $bachelor->degree == 'D/Fair/50% - 65%' ? 'selected' : ''}}>D/Fair/50% - 65%</option>
                                                <option value="Not specified" {{ $bachelor->degree == 'Not specified' ? 'selected' : ''}}>Not specified</option>
                                              </select>
                                            </div>
                                          </div>
                                      </div>
                                      @else
                                      <div class="row">
                                        <h5 style="color: #093adc;">Add Master Degree Information</h5>
                                        <div class="form-group col-md-6">
                                          <label>University/Institution <span class="colo">*</span></label>
                                          <input type="text" class="form-control" name="master_university" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label>Field of Study <span class="colo">*</span></label>
                                          <input type="text" class="form-control" name="master_field_of_study" required>
                                        </div>
                                        <div class="row">
                                          <div class="form-group col-md-6">
                                            <label>Start Year <span class="colo">*</span></label>
                                            <input type="text"  class="form-control" id="datepicker" name="master_start_year"/>
                                          </div>
                                          <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <label>End Year <span class="colo">*</span></label>
                                            <input type="text"  class="form-control" id="datepicker" name="master_end_year"/>
                                          </div>
                                          <small style="font-size: 15px;">If you're still studying, add your expected graduation year.</small>
                                        </div>
                                        <br>
                                        <label>Degree <span class="colo">*</span></label>
                                        <div class="form-group col-md-6">
                                          <div class="input-group">
                                            <select class="custom-select" id="inputGroupSelect05" name="master_degree" required>
                                              <option selected>Choose...</option>
                                              <option value="A/Excellent/85% - 100%">A/Excellent/85% - 100%</option>
                                              <option value="B/Very good/75% - 85%">B/Very good/75% - 85%</option>
                                              <option value="C/Good/65% - 75%">C/Good/65% - 75%</option>
                                              <option value="D/Fair/50% - 65%">D/Fair/50% - 65%</option>
                                              <option value="Not specified">Not specified</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      @endif
                                    </div>&nbsp;
                                    <div class="info"  id="doctorate" style="{{ $employee->education_level_id == 3 ? 'display: block' : 'display: none'}}"> 
                                      @if ($bachelor)
                                      <div class="row">
                                              <h5 style="color: #093adc;"> Bachelor's Information Degree</h5>
                                              <div class="form-group col-md-6">
                                                <label>University/Institution <span class="colo">*</span></label>
                                                <input type="text" class="form-control" value="{{$bachelor->university}}" name="doctorate_degree_university" required>
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label>Field of Study <span class="colo">*</span></label>
                                                <input type="text" class="form-control" value="{{$bachelor->field_of_study}}" name="doctorate_degree_field_of_study" required>
                                              </div>
                                              <div class="row">
                                                <div class="form-group col-md-6">
                                                  <label>Start Year <span class="colo">*</span></label>
                                                  <input type="text"  class="form-control" id="datepicker" value="{{$bachelor->start_year}}" name="doctorate_degree_start_year"/>
                                                </div>
                                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                                  <label>End Year <span class="colo">*</span></label>
                                                  <input type="text"  class="form-control" id="datepicker" value="{{$bachelor->end_year}}" name="doctorate_degree_end_year"/>
                                                </div>
                                                <small style="font-size: 15px;">If you're still studying, add your expected graduation year.</small>
                                              </div>
                                              <br>
                                              <label>Degree <span class="colo">*</span></label>
                                              <div class="form-group col-md-6">
                                                <div class="input-group">
                                                  <select class="custom-select" id="inputGroupSelect05" name="doctorate_degree_degree" required>
                                                    <option selected>Choose...</option>
                                                    <option value="A/Excellent/85% - 100%" {{ $bachelor->degree == 'A/Excellent/85% - 100%' ? 'selected' : ''}}>A/Excellent/85% - 100%</option>
                                                    <option value="B/Very good/75% - 85%" {{ $bachelor->degree == 'B/Very good/75% - 85%' ? 'selected' : ''}}>B/Very good/75% - 85%</option>
                                                    <option value="C/Good/65% - 75%" {{ $bachelor->degree == 'C/Good/65% - 75%' ? 'selected' : ''}}>C/Good/65% - 75%</option>
                                                    <option value="D/Fair/50% - 65%" {{ $bachelor->degree == 'D/Fair/50% - 65%' ? 'selected' : ''}}>D/Fair/50% - 65%</option>
                                                    <option value="Not specified" {{ $bachelor->degree == 'Not specified' ? 'selected' : ''}}>Not specified</option>
                                                  </select>
                                                </div>
                                              </div>
                                      </div>
                                      @else
                                      <div class="row">
                                        <h5 style="color: #093adc;">Add Bachelor's Information Degree</h5>
                                        <div class="form-group col-md-6">
                                          <label>University/Institution <span class="colo">*</span></label>
                                          <input type="text" class="form-control" name="doctorate_degree_university" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label>Field of Study <span class="colo">*</span></label>
                                          <input type="text" class="form-control" name="doctorate_degree_field_of_study" required>
                                        </div>
                                        <div class="row">
                                          <div class="form-group col-md-6">
                                            <label>Start Year <span class="colo">*</span></label>
                                            <input type="text"  class="form-control" id="datepicker" name="doctorate_degree_start_year"/>
                                          </div>
                                          <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <label>End Year <span class="colo">*</span></label>
                                            <input type="text"  class="form-control" id="datepicker" name="doctorate_degree_end_year"/>
                                          </div>
                                          <small style="font-size: 15px;">If you're still studying, add your expected graduation year.</small>
                                        </div>
                                        <br>
                                        <label>Degree <span class="colo">*</span></label>
                                        <div class="form-group col-md-6">
                                          <div class="input-group">
                                            <select class="custom-select" id="inputGroupSelect05" name="doctorate_degree_degree" required>
                                              <option selected>Choose...</option>
                                              <option value="A/Excellent/85% - 100%">A/Excellent/85% - 100%</option>
                                              <option value="B/Very good/75% - 85%">B/Very good/75% - 85%</option>
                                              <option value="C/Good/65% - 75%">C/Good/65% - 75%</option>
                                              <option value="D/Fair/50% - 65%">D/Fair/50% - 65%</option>
                                              <option value="Not specified">Not specified</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      @endif
                                      <br><br>
                                      @if ($master)
                                      <div class="row">                                 
                                          <h5 style="color: #093adc;"> Master Degree Information</h5>
                                          <div class="form-group col-md-6">
                                            <label>University/Institution <span class="colo">*</span></label>
                                            <input type="text" class="form-control" value="{{$master->university}}" name="doctorate_master_university" required>
                                          </div>
                                          <div class="form-group col-md-6">
                                            <label>Field of Study <span class="colo">*</span></label>
                                            <input type="text" class="form-control" value="{{$master->field_of_study}}" name="doctorate_master_field_of_study" required>
                                          </div>
                                          <div class="row">
                                            <div class="form-group col-md-6">
                                              <label>Start Year <span class="colo">*</span></label>
                                              <input type="text"  class="form-control" id="datepicker" value="{{$master->start_year}}" name="doctorate_master_start_year"/>
                                            </div>
                                            <div class="form-group col-md-6 mt-3 mt-md-0">
                                              <label>End Year <span class="colo">*</span></label>
                                              <input type="text"  class="form-control" id="datepicker" value="{{$master->end_year}}" name="doctorate_master_end_year"/>
                                            </div>
                                            <small style="font-size: 15px;">If you're still studying, add your expected graduation year.</small>
                                          </div>
                                          <br>
                                          <label>Degree <span class="colo">*</span></label>
                                          <div class="form-group col-md-6">
                                            <div class="input-group">
                                              <select class="custom-select" id="inputGroupSelect05" name="doctorate_master_degree" required>
                                                <option selected>Choose...</option>
                                                <option value="A/Excellent/85% - 100%" {{ $master->degree == 'A/Excellent/85% - 100%' ? 'selected' : ''}}>A/Excellent/85% - 100%</option>
                                                <option value="B/Very good/75% - 85%" {{ $master->degree == 'B/Very good/75% - 85%' ? 'selected' : ''}}>B/Very good/75% - 85%</option>
                                                <option value="C/Good/65% - 75%" {{ $master->degree == 'C/Good/65% - 75%' ? 'selected' : ''}}>C/Good/65% - 75%</option>
                                                <option value="D/Fair/50% - 65%" {{ $master->degree == 'D/Fair/50% - 65%' ? 'selected' : ''}}>D/Fair/50% - 65%</option>
                                                <option value="Not specified" {{ $master->degree == 'Not specified' ? 'selected' : ''}}>Not specified</option>
                                              </select>
                                            </div>
                                          </div>
                                          
                                      </div>
                                      @else
                                      <div class="row">
                                        <h5 style="color: #093adc;">Add Master Degree Information</h5>
                                        <div class="form-group col-md-6">
                                          <label>University/Institution <span class="colo">*</span></label>
                                          <input type="text" class="form-control" name="doctorate_master_university" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label>Field of Study <span class="colo">*</span></label>
                                          <input type="text" class="form-control" name="doctorate_master_field_of_study" required>
                                        </div>
                                        <div class="row">
                                          <div class="form-group col-md-6">
                                            <label>Start Year <span class="colo">*</span></label>
                                            <input type="text"  class="form-control" id="datepicker" name="doctorate_master_start_year"/>
                                          </div>
                                          <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <label>End Year <span class="colo">*</span></label>
                                            <input type="text"  class="form-control" id="datepicker" name="doctorate_master_end_year"/>
                                          </div>
                                          <small style="font-size: 15px;">If you're still studying, add your expected graduation year.</small>
                                        </div>
                                        <br>
                                        <label>Degree <span class="colo">*</span></label>
                                        <div class="form-group col-md-6">
                                          <div class="input-group">
                                            <select class="custom-select" id="inputGroupSelect05" name="doctorate_master_degree" required>
                                              <option selected>Choose...</option>
                                              <option value="A/Excellent/85% - 100%">A/Excellent/85% - 100%</option>
                                              <option value="B/Very good/75% - 85%">B/Very good/75% - 85%</option>
                                              <option value="C/Good/65% - 75%">C/Good/65% - 75%</option>
                                              <option value="D/Fair/50% - 65%">D/Fair/50% - 65%</option>
                                              <option value="Not specified">Not specified</option>
                                            </select>
                                          </div>
                                        </div>
                                    </div>
                                      @endif
                                      <br><br>
                                      @if ($doctorate)
                                      <div class="row">
                                        <h5 style="color: #093adc;"> Doctorate Degree Information</h5>
                                        <div class="form-group col-md-6">
                                          <label>University/Institution <span class="colo">*</span></label>
                                          <input type="text" class="form-control" value="{{$doctorate->university}}"  name="doctorate_university" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label>Field of Study <span class="colo">*</span></label>
                                          <input type="text" class="form-control" value="{{$doctorate->field_of_study}}"  name="doctorate_field_of_study" required>
                                        </div>
                                        <div class="row">
                                          <div class="form-group col-md-6">
                                            <label>Start Year <span class="colo">*</span></label>
                                            <input type="text"  class="form-control" id="datepicker" value="{{$doctorate->start_year}}"  name="doctorate_start_year"/>
                                          </div>
                                          <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <label>End Year <span class="colo">*</span></label>
                                            <input type="text"  class="form-control" id="datepicker" value="{{$doctorate->end_year}}" name="doctorate_end_year"/>
                                          </div>
                                          <small style="font-size: 15px;">If you're still studying, add your expected graduation year.</small>
                                        </div>
                                        <br>
                                        <label>Degree <span class="colo">*</span></label>
                                        <div class="form-group col-md-6">
                                          <div class="input-group">
                                            <select class="custom-select" id="inputGroupSelect05" name="doctorate_degree" required>
                                              <option selected>Choose...</option>
                                              <option value="A/Excellent/85% - 100%" {{ $doctorate->degree == 'A/Excellent/85% - 100%' ? 'selected' : ''}}>A/Excellent/85% - 100%</option>
                                              <option value="B/Very good/75% - 85%" {{ $doctorate->degree == 'B/Very good/75% - 85%' ? 'selected' : ''}}>B/Very good/75% - 85%</option>
                                              <option value="C/Good/65% - 75%" {{ $doctorate->degree == 'C/Good/65% - 75%' ? 'selected' : ''}}>C/Good/65% - 75%</option>
                                              <option value="D/Fair/50% - 65%" {{ $doctorate->degree == 'D/Fair/50% - 65%' ? 'selected' : ''}}>D/Fair/50% - 65%</option>
                                              <option value="Not specified" {{ $doctorate->degree == 'Not specified' ? 'selected' : ''}}>Not specified</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      @else
                                      <div class="row">
                                        <h5 style="color: #093adc;">Add Doctorate Degree Information</h5>
                                        <div class="form-group col-md-6">
                                          <label>University/Institution <span class="colo">*</span></label>
                                          <input type="text" class="form-control" name="doctorate_university" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label>Field of Study <span class="colo">*</span></label>
                                          <input type="text" class="form-control" name="doctorate_field_of_study" required>
                                        </div>
                                        <div class="row">
                                          <div class="form-group col-md-6">
                                            <label>Start Year <span class="colo">*</span></label>
                                            <input type="text"  class="form-control" id="datepicker" name="doctorate_start_year"/>
                                          </div>
                                          <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <label>End Year <span class="colo">*</span></label>
                                            <input type="text"  class="form-control" id="datepicker" name="doctorate_end_year"/>
                                          </div>
                                          <small style="font-size: 15px;">If you're still studying, add your expected graduation year.</small>
                                        </div>
                                        <br>
                                        <label>Degree <span class="colo">*</span></label>
                                        <div class="form-group col-md-6">
                                          <div class="input-group">
                                            <select class="custom-select" id="inputGroupSelect05" name="doctorate_degree" required>
                                              <option selected>Choose...</option>
                                              <option value="A/Excellent/85% - 100%">A/Excellent/85% - 100%</option>
                                              <option value="B/Very good/75% - 85%">B/Very good/75% - 85%</option>
                                              <option value="C/Good/65% - 75%">C/Good/65% - 75%</option>
                                              <option value="D/Fair/50% - 65%">D/Fair/50% - 65%</option>
                                              <option value="Not specified">Not specified</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                       @endif
                                    </div>&nbsp;
                                    <style>
                                      .none {
                                        display: none !important;
                                      }
                                    </style>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary px-3">Save</button>
                                    </div>
                                    @else
                                    @if ($universityDegrees->isNotEmpty())
                        <div class="">
                          <div class=" info p-0">
                          <div class="fs-title">
                            <h4 style="color: #093adc " class="p-4">Degrees</h4>
                          </div>
                          <div class="card-body p-2">
                            @foreach($universityDegrees as $universityDegree) 
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
                                          <div class="css-b86ayu">@if($universityDegree->education_level == 1)
                                            Bachelor's Degree of {{$universityDegree->field_of_study}}
                                            @elseif($universityDegree->education_level == 2)
                                            Master Degree of {{$universityDegree->field_of_study}}
                                            @elseif($universityDegree->education_level == 3)
                                            Doctorate Degree of {{$universityDegree->field_of_study}}
                                            @else
                                            {{$universityDegree->field_of_study}}
                                            @endif</div><div class="">
                                            <div class="css-1wpyv9g e18pz6632"></div>
                                            
                                    </div><div class="css-1q8vkew">{{$universityDegree->university}}</div>
                                    <div class="css-an5px">{{$universityDegree->start_year}} - {{$universityDegree->end_year}}</div></div>
                            @endforeach
                            <br>
                          </div>
                        </div>
                        </div>
                      @endif
                                    @endif
                                    </form>
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
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script type='text/javascript'
            src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'>
        </script>
    </main><!-- End #main -->
@endsection

