@extends('layouts.base ' ,['title'=>'Job : '.$job->title])
@section("content")
 <!-- ======= Header ======= -->
 @include('layouts.header')
<!-- End Header -->
    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="info">
                            <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                    <div class="contents pt-4 pt-lg-0">
                                        <h1>{{$job->title}}</h1>
                                    </div>
                                    <div class="content1 pt-4 pt-lg-0">
                                        <span style="background-color:#f7f1f1">{{$job->jobType->name}}</span>
                                        <p>{{$job->employer->name}}<i class="bi bi-patch-check-fill"
                                                    style="color:#093adc"></i></p>
                                                
                                        <h6 class="my-2">Posted {{$job->created_at->diffForHumans()}}</h6>
                                        <h6>{{$job->vacancies}} open position</h6>
                                        <hr>
                                        {{-- <button class="btn btn-primary"><a href="" class="co">Apply For Job</a></button> --}}
                                        <button type="button" class="btn btn-primary" data-toggle="modal" href="#apply{{$job->id}}" data-target="#apply{{$job->id}}">
                                            Apply For Job</button>
                                    </div>
                                </div>
                            </div>
                        </div>&nbsp;
                        <div class="info">
                            <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                    <div class="contents pt-4 pt-lg-0">
                                        <h2>Job Details</h2>
                                    </div>
                                    <div class="content1 pt-4 pt-lg-0">
                                        <div>
                                            <span class="spanStyle">Experience:</span>
                                            <span class="css-47jx3m">{{$job->experience}}</span>
                                        </div>
                                        <div>
                                            <span class="spanStyle">Career Level:</span>
                                            <span class="css-47jx3m">{{$job->careerLevel->name}}</span>
                                        </div>
                                        <div>
                                            <span class="spanStyle">Salary:</span>
                                            @if($job->salary)
                                            <span class="css-47jx3m">{{number_format($job->salary, 2)}}</span>  
                                            @else
                                            <span class="css-47jx3m">Confidential</span>
                                            @endif
                                        </div>
                                        <div>
                                            <span class="spanStyle">Job Category:</span>
                                            <span class="css-47jx3m">{{$job->category->name}}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>&nbsp;
                        <div class="info">
                            <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                    <div class="contents pt-4 pt-lg-0">
                                        <h2 class="css-9zp57u">Job Description</h2>
                                    </div>
                                    <div class="content1 user-text pt-4 pt-lg-0">
                                        <div class="css-1uobp1k">
                                            <p>
                                            {!!$job->description !!}
                                            </p>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>&nbsp;
                        <div class="info">
                            <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                    <div class="contents pt-4 pt-lg-0">
                                        <h2 class="css-9zp57u">Job Requirements</h2>
                                    </div>
                                    <div class="content1 user-text pt-4 pt-lg-0">
                                        <div class="css-1uobp1k">
                                            <p>
                                                {!! $job->requirements !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>&nbsp;
                        @if ($featuredJobs->isNotEmpty())
                        <div class="info">
                            <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                    <div class="contents pt-4 pt-lg-0">
                                        <h3 class="css-9zp57u">Featured Jobs</h3>
                                    </div>
                                    <div class="content1 pt-4 pt-lg-0">
                                        <ul class="css-1b1zfbw">
                                            @foreach($featuredJobs as $featuredJob)
                                            <li class="css-19kjb9s">
                                                <div class="css-cfkofj">
                                                    <a class="css-15d3l4v"
                                                        href="{{route ('jobDetails', [$featuredJob->id])}}">
                                                        {{$featuredJob->title}} </a><strong class="css-ub6iu5">{{$featuredJob->employer->name}} - {{$featuredJob->location}}</strong><span
                                                        class="css-te76vt">{{$featuredJob->created_at->diffForHumans()}}</span></div><img
                                                        src="{{asset('uploads/employers/'.$featuredJob->employer->logo)}}"
                                                        alt="Logo" class="css-150rmtx">
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>&nbsp;
                        @endif
                        @if ($similarJobs->isNotEmpty())
                        <div class="info">
                            <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                    <div class="contents pt-4 pt-lg-0">
                                        <h3 class="css-9zp57u">Similar Jobs</h3>
                                    </div>
                                    <div class="content1 pt-4 pt-lg-0">
                                        <ul class="css-1b1zfbw">
                                            @foreach($similarJobs as $similarJob)
                                            <li class="css-19kjb9s">
                                                <div class="css-cfkofj"><a class="css-15d3l4v"
                                                        href="{{route ('jobDetails', [$similarJob->id])}}">
                                                    {{$similarJob->title}} </a><strong class="css-ub6iu5">{{$similarJob->employer->name}} - {{$similarJob->location}}</strong><span
                                                        class="css-te76vt">{{$similarJob->created_at->diffForHumans()}}</span></div><img
                                                        src="{{asset('uploads/employers/'.$similarJob->employer->logo)}}"
                                                        alt="Logo" class="css-150rmtx">
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @include('jobs.job-apply')
            </div>
        </section><!-- End About Section -->
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script src="{{ asset('assets/js/myScript.js')}}"></script>
        <script type='text/javascript'
            src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'>
        </script>
    </main><!-- End #main -->
@endsection