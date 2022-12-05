@extends('layouts.base ' ,['title'=>'CAREERNA | CV'])

@section("content")
    <!-- ======= Header ======= -->
    @include('layouts.employee-header')
      <!-- End Header -->
    <main id="main">


        <!-- ======= About Section ======= -->
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
                        </div>&nbsp;
                    </div>
                    <div class="col-md-8">
                        <form id="personal"  action="{{ route('employee.updateCV' , [$employee->id]) }}"
                            method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        @if($employee->cv)
                        <div class="upload-cv__upload-area.is-done info">
                            <p class="upload-cv__drag-pragraph --desktop" style="color: #808ea5;">You last updated your CV on {{$employee->updated_at->format('d') }}, {{$employee->updated_at->format('M') }}, {{$employee->updated_at->format('y') }} . 
                                <span class="css-1r5gb7q"><a href="{{asset('uploads/employees/cv/'.$employee->cv)}}" download><span class="css-v96zsv" >Preview CV</span></a></span></p>
                        </div>&nbsp;
                            
                        @endif
                        @if(session('employee_token'))
                        <div class="info text-center">
                            <div>
                                <i class="bi bi-file-earmark"></i> <br><br>

                            </div>
                            <div class="divs file btn btn-primary btn-cv uploader-normal-button">
                                Upload Your CV
                                <input class="inputs" type="file" name="cv" role="uploadcare-uploader"/>
                            </div>
                        </div>&nbsp;
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-3">Save</button>
                        </div>
                        @endif
                        </form>
                    </div>
                </div>
                <div class="section-title" data-aos="fade-up">
                </div>
            </div>
            </div>
        </section><!-- End About Section -->

    </main><!-- End #main -->
@endsection
  