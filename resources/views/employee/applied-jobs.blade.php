@extends('layouts.base ' ,['title'=>'CAREERNA | Applied Jobs']) 
@section("content") 
    <!-- ======= Header ======= -->
    @include('layouts.employee-header')
    <!-- End Header -->


    <main id="main">


        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container">
               <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                <div class="row">
                    <div class="col-md-8 m-auto">
                        <div>
                            <h1 class="style">({{$count}})  Applications  </h1>

                        </div>
                        @foreach($appliedJobs as $job)
                        <div class="info">
                            <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                    <div class="contents pt-4 pt-lg-0">
                                        <h3><a class="css-1v01ggk" target="_blank" href="{{route ('jobDetails', [$job->job->id])}}">{{$job->job->title}}</a> &nbsp; <span
                                                class="spanStye">{{$job->job->jobType->name}}</span></h3>
                                    </div>
                                    <div class="content1 pt-4 pt-lg-0">
                                        <p class="css-1d6m423 e1ojjapo4"><a target="_blank" class="css-1m8eti0 e1ojjapo1">{{$job->job->employer->name}}</a><span>- </span><span class="css-sfbcwm e1ojjapo3">{{$job->location}}</span></p>
                                        <p class="css-1uobp1k">
                                            

                                            {{$job->job->careerLevel->name}} · 7-10 Yrs of Exp · {{$job->job->category->name}} ·<br>
                                            Infrastructure as a Service ·Infrastructure Management · infrastucture ·
                                             <br> in {{$job->created_at->diffForHumans()}}
                                        </p>
                                        <hr>
                                        <button class="css-1x0pd2"><a class="css-1x0pd2" href="{{route('deleteAppliedJob', [$job->job->id])}}"><i
                                         class="bi-trash"></i>&nbsp;Discard Application</a>&nbsp;&nbsp;</button>
                                      
                                        <button class="css-1x0pd2"><a href="" class="css-1x0pd2 "><i
                                                    class="bi-share"></i>&nbsp;Share</a>&nbsp;&nbsp;</button>
                                    </div>
                                </div>
                            </div>
                        </div>&nbsp;
                        @endforeach   
                    </div>
                </div>
                <div class="section-title" data-aos="fade-up">
                </div>
            </div>
            </div>
        </section><!-- End About Section -->

    </main><!-- End #main -->

 @endsection