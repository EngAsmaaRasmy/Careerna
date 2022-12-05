@extends('layouts.base ' ,['title'=>'CAREERNA| employee  profile'])  
@section("content")
@include('layouts.employee-header')


    <main id="main">


        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container">
               <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                <div class="row">
                    <div class="col-md-8">
                        <div>
                            <h1 class="style">Explore New Career Opportunities</h1>

                        </div>
                        @foreach($jobs as $job)
                        <div class="info">
                            <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                    <div class="contents pt-4 pt-lg-0">
                                        <h3><a class="css-1v01ggk" target="_blank" href="{{route ('jobDetails', [$job->id])}}">{{$job->title}}</a> &nbsp; <span
                                                class="spanStye">{{$job->jobType->name}}</span></h3>
                                    </div>
                                    <div class="content1 pt-4 pt-lg-0">
                                        <p class="css-1d6m423 e1ojjapo4"><a target="_blank" class="css-1m8eti0 e1ojjapo1">{{$job->employer->name}}</a><span>- </span><span class="css-sfbcwm e1ojjapo3">{{$job->location}}</span></p>
                                        <p class="css-1uobp1k">
                                            {{$job->careerLevel->name}} · 7-10 Yrs of Exp · {{$job->category->name}} ·<br>
                                            Infrastructure as a Service ·Infrastructure Management · infrastucture ·
                                            <br> in {{$job->created_at->diffForHumans()}}
                                        </p>
                                        <hr>
                                        @php
                                        $saved = App\Models\SavedJob::where('job_id', $job->id)->where('employee_id', session('employee_id'))->first();
                                        @endphp
                                        @if ($saved)
                                        <button class="css-1kiywu"><a class="css-1kiywu" href="{{route('deleteSaveJob', [$job->id])}}"><i
                                            class="bi-bookmark-fill"></i>&nbsp;Un Save</a>&nbsp;&nbsp;</button>
                                            
                                        @else
                                        <form class="d-inline-block" action="{{route ('saveJob')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{$job->id}}" name="job_id">
                                            <button class="css-1x0pd2"><a class="css-1x0pd2 "><i
                                                class="bi-bookmark"></i>&nbsp;Save</a>&nbsp;&nbsp;</button>
                                        </form> 
                                        @endif
                                        <button class="css-1x0pd2 copy" onclick="myFunction()" onmouseout="outFunc()">
                                            <input type="hidden" name="item[]" id="copyInput" value="{{url("/job/{$job->id}")}}" class="css-1x0pd2 "><i
                                            class="bi-share"></i>&nbsp;&nbsp;&nbsp;share
                                            <span class="tooltiptext" id="myTooltip">Copy to clipboard</span></button>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>&nbsp;
                        @endforeach   
                    </div>

                    <div class="col-md-4" style="margin-top:40px">

                        <div class="info">
                            <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                    <div class="content1 pt-4 pt-lg-0">
                                        <div class="wrapper">
                                            <div class="profile">
                                                @isset($employee->personalDetail->image)
                                                <img src="{{asset('uploads/employees/'.$employee->personalDetail->image)}}" alt="" class="thumbnail">
                                                @endisset
                                                <img src="{{ asset('./assets/img/avatar.png')}}" alt="..." class="thumbnail">
                                                <h3 class="name">{{$employee->personalDetail->first_name ?? ""}} {{$employee->personalDetail->last_name ?? ""}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>&nbsp;
                    </div>
                </div>
                <div class="section-title" data-aos="fade-up">
                </div>
            </div>
            </div>
        </section><!-- End About Section -->

    </main><!-- End #main -->
@endsection

 