@extends('layouts.base ' ,['title'=>'CAREERNA | Employer Profile'])

@section("content")
@include('layouts.employer-header')
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h1>Hello {{$employer->first_name}}</h1>
                                        </div>
                                        <div class=" col-md-6 text-right">
                                            <button class="btn btn-primary  ">
                                                <a class="co" href="{{ route('employer.postJob') }}"> Add New Post</a>
                                            </button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div><br>
                    <div class="col-md-8">
                        <br><br>
                        <div class="info">
                            <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">

                                    <div class="content1 pt-4 pt-lg-0 text-center">
                                        <div class="tab-content">
                                            <div class="tab-pane active show " id="tab-1">
                                                <figure>
                                                    <img src="{{ asset('assets/img/slider.png')}}" alt="" class="img-fluid">
                                                </figure>
                                            </div>
                                        </div>
                                        <h4>Your Job Assistant</h4>
                                        <p class="css-1uobp1k">
                                            Once you add your jobs and receive candidates, your assistant will highlight
                                            the most potential candidates for you to check.
                                        </p>
                                        <hr>
                                        <button class="btn btn-primary  ">
                                            <a class="co" href="{{ route('employer.postJob') }}"> Add New Post</a>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>&nbsp;

                    </div>

                    <div class="col-md-4" style="margin-top:40px">

                        <div class="info">
                            <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">

                                    <div class="content1 pt-4 pt-lg-0">

                                        <div class="wrapper">
                                            <ul>
                                                <li><a class="nav-link scrollto" href="{{ route('employer.show.updateProfile') }}">Edit
                                                        Company</a></li>
                                                <li><a class="nav-link scrollto" href="{{ route('employer.postJob') }}">Post New Job</a>
                                                </li>
                                                <li><a class="nav-link scrollto" href="{{ route('site-jobs.index') }}"> View All Jobs</a>
                                                </li>
                                                <li><a class="nav-link scrollto" href="{{route('employer.logout') }}"> Log Out</a></li>

                                            </ul>
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
  