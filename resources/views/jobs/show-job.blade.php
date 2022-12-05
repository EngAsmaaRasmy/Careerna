@extends('layouts.base ' ,['title'=>'Job : '.$job->title])

@section("content")
    <!-- ======= Header ======= -->
    @include('layouts.employer-header')
    <!-- End Header -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container">
            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="info">
                            <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                    <div class="contents pt-4 pt-lg-0">
                                        <div class="contents pt-4 pt-lg-0">
                                            <h3>{{$job->title}}
                                                &nbsp; <span
                                                class="spanStye">{{$job->jobType->name}}</span></h3>
                                        </div>
                                    </div>
                                    <div class="content1 pt-4 pt-lg-0">

                                        <p class="css-1uobp1k">
                                            {{$job->category->name}}<br>
                                            {{$job->created_at->diffForHumans()}}<br>
                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>&nbsp;
                        &nbsp;
                            <div class="info">
                                <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                    <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                        <div class="contents pt-4 pt-lg-0">
                                            <h4>Job Details</h4>
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
                                            <h4>Applicants for this job</h4>
                                        </div>&nbsp;
                                        

                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Employee Name</th>
                                                <th scope="col">Submission time</th>
                                                <th scope="col">CV</th>
                                                <th scope="col">Profile</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($appliedJobs as $appliedJob)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$appliedJob->employee->personalDetail->first_name}} 
                                                    {{$appliedJob->employee->personalDetail->last_name}}</td>
                                                <td>{{$appliedJob->created_at->diffForHumans()}}</td>
                                                <td><a download href="{{asset('uploads/employees/cv/'.$appliedJob->employee->cv)}}">{{$appliedJob->employee->personalDetail->first_name}} CV </a></td>
                                                <td><button class="css-1x0pd2">
                                                    <a class="css-1x0pd233" style="color: #093adc !important" href="{{route('employee.show.generalInfo',[$appliedJob->employee->id])}}"><i
                                                    class="bi bi-eye"></i>&nbsp;Show Profile</a>&nbsp;&nbsp;</button> </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script src="{{ asset('assets/js/myScript.js')}}"></script>
        <script type='text/javascript'
            src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'>
        </script>

    </main><!-- End #main -->
@endsection