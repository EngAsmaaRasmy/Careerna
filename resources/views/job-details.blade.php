@extends('layouts.base ' ,['title'=>'Job : '.$job->title])
@section("content")
<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="logo me-auto">
            <h1><a href="{{ url ('/') }}"><img src="{{asset('./assets/img/Logo.png')}}" alt=""></a></h1>
        </div>

        <nav id="navbar" class="navbar order-last order-lg-0 text-left">
            <ul>
                
                <li><a class="nav-link scrollto " href="explor.html">Explore</a></li>
                <li>
                    <form class="my-2" action="{{route ('saveJob')}} " method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="hidden" value="{{$job->id}}" name="service_id"> --}}
                        <a type="submit" class="nav-link scrollto">Save</a>
                    </form></li>
                <div class="btn-wrap">
                    <div class="input-group rounded">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                            aria-describedby="search-addon" />
                        <span class="input-group-text border-0" id="search-addon">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
                <div class="btn-wrap">
                    <button class="btn btn-primary"><i class="bi bi-menu-button-wide"></i></button>
                </div>
           </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                </div>
                <div class="row">
                    <div class="info">
                        <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                            <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                <div class="contents pt-4 pt-lg-0">
                                    <h1>{{$job->title}}</h1>
                                </div>
                                <div class="content1 pt-4 pt-lg-0">
                                    <span style="background-color:#f7f1f1">{{$job->jobType->name}}</span>
                                    <p><a href="">{{$job->employer->name}}<i class="bi bi-patch-check-fill"
                                                style="color:#093adc"></i></a> </p>
                                    <h6>Posted {{$job->created_at->diffForHumans()}}</h6><br>
                                    <h6>open position: {{$job->vacancies}}</h6>
                                    <hr>
                                    <button class="btn btn-primary"><a href="" class="co">Apply For Job</a></button>


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
                                    {{-- <div>
                                        <span class="spanStyle">Experience Needed:</span>
                                        <span class="css-47jx3m">More Than 3 Years</span>
                                    </div> --}}

                                    <div>
                                        <span class="spanStyle">Career Level:</span>
                                        <span class="css-47jx3m">{{$job->careerLevel->name}}</span>
                                    </div>
                                    <div>
                                        <span class="spanStyle">Education Level:</span>
                                        <span class="css-47jx3m">{{$job->educationLevel->name}}</span>
                                    </div>
                                    <div>
                                        <span class="spanStyle">Salary:</span>
                                        <span class="css-47jx3m">{{$job->salary}}</span>
                                    </div>
                                    <div>
                                        <span class="spanStyle">Job Category:</span>
                                        <span class="css-47jx3m">{{$job->category->name}}</span>
                                    </div>
                                    <div class="css-s2o0yh">
                                        <h4 class="css-1ott775">Skills And Tools:</h4>
                                        <a href="" class="css-g65o95">
                                            <span class="css-6to1q">
                                                <span class="css-tt12j1 e12tgh591">
                                                    <span class="css-158icaa">
                                                        Experience
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                        <a href="" class="css-g65o95">
                                            <span class="css-6to1q">
                                                <span class="css-tt12j1 e12tgh591">
                                                    <span class="css-158icaa">
                                                        HTML
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                        <a href="" class="css-g65o95">
                                            <span class="css-6to1q">
                                                <span class="css-tt12j1 e12tgh591">
                                                    <span class="css-158icaa">
                                                        CSS
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                        <a href="" class="css-g65o95">
                                            <span class="css-6to1q">
                                                <span class="css-tt12j1 e12tgh591">
                                                    <span class="css-158icaa">
                                                        Java Script
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                        <a href="" class="css-g65o95">
                                            <span class="css-6to1q">
                                                <span class="css-tt12j1 e12tgh591">
                                                    <span class="css-158icaa">
                                                        PHP
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                        <a href="" class="css-g65o95">
                                            <span class="css-6to1q">
                                                <span class="css-tt12j1 e12tgh591">
                                                    <span class="css-158icaa">
                                                        Vue JS
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                        <a href="" class="css-g65o95">
                                            <span class="css-6to1q">
                                                <span class="css-tt12j1 e12tgh591">
                                                    <span class="css-158icaa">
                                                        bootstrap
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                        <a href="" class="css-g65o95">
                                            <span class="css-6to1q">
                                                <span class="css-tt12j1 e12tgh591">
                                                    <span class="css-158icaa">
                                                        UI/UX
                                                    </span>
                                                </span>
                                            </span>
                                        </a>

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
                                <div class="content1 pt-4 pt-lg-0">
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
                                <div class="content1 pt-4 pt-lg-0">
                                    <div class="css-1uobp1k">
                                        <p>
                                            {!! $job->requirements !!}
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
                                    <h3 class="css-9zp57u">Featured Jobs</h3>
                                </div>
                                <div class="content1 pt-4 pt-lg-0">
                                    <ul class="css-1b1zfbw">
                                        @foreach($featuredJobs as $featuredJob)
                                        <li class="css-19kjb9s">
                                            <div class="css-cfkofj">
                                                <a class="css-15d3l4v"
                                                    href="/jobs/p/aaYrqWSlpYic-Sales-Executive-Al-Khail-Industries-Trading-Khartoum-Egypt?l=jp&amp;t=fj&amp;o=1&amp;ref=featured-jobs-job-page">
                                                    {{$featuredJob->title}}</a><strong class="css-ub6iu5"><a
                                                        href="https://wuzzuf.net/jobs/careers/Al-Khail-Industries--amp--Trading-Egypt-29740"
                                                        class="css-lxsqij">Al-Khail Industries &amp; Trading </a> -
                                                        {{$featuredJob->location}}</strong><span class="css-te76vt">{{$featuredJob->created_at->diffForHumans()}}</span>
                                            </div><a
                                                href="/jobs/p/aaYrqWSlpYic-Sales-Executive-Al-Khail-Industries-Trading-Cairo-Egypt?l=jp&amp;t=fj&amp;o=1&amp;ref=featured-jobs-job-page"><img
                                                    src="https://images.wuzzuf-data.net/files/company_logo/Al-Khail-Industries--amp--Trading-Egypt-29740-1514497249-sm.jpeg"
                                                    alt="Logo" class="css-150rmtx"></a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>&nbsp;
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
                                                    href="/jobs/p/IOhJZgHggGQJ-Sales-Supervisor-Retail-Large-Retail---Greater-Cairo-DevartLab-Cairo-Egypt?l=jp&amp;t=sij&amp;o=1">
                                                   {{$similarJob->title}} ( Retail &amp; La...</a><strong class="css-ub6iu5"><a
                                                        href="https://wuzzuf.net/jobs/careers/DevartLab-Egypt-22198"
                                                        class="css-lxsqij">{{$similarJob->employer->name}}</a> - {{$similarJob->location}}</strong><span
                                                    class="css-te76vt">{{$similarJob->created_at->diffForHumans()}}</span></div><a
                                                href="/jobs/p/IOhJZgHggGQJ-Sales-Supervisor-Retail-Large-Retail---Greater-Cairo-DevartLab-Cairo-Egypt?l=jp&amp;t=sij&amp;o=1"><img
                                                    src="https://images.wuzzuf-data.net/files/company_logo/DevartLab-Egypt-22198-1485256827-sm.png"
                                                    alt="Logo" class="css-150rmtx"></a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->
       
    </main><!-- End #main -->
@endsection