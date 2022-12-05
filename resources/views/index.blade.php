@extends('layouts.base ' ,['title'=>'CAREERNA | Website'])

@section("content")
@include('layouts.header')

  <main id="main">
      <!-- ======= Hero Section ======= -->
  <section id="hero" class="mb-5">
    <div class="container">
      
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <div>
            <h1> Find the best relevant jobs in Sudan.</h1>
            <h2> Are you searching for better opportunities in your career? Careerna help you 
                in your career journey.</h2>
            <a href="{{ route('employee.show.login.form') }}" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets/img/background.jpg" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
  <br><br><br>
    <section id="portfolio-details" class="portfolio-details mb-5">
      <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                <div class="col-lg-8 mt-2 mb-tg-0 ">
                  <i class="bi bi-calendar4"></i><br><br>
                  <h2>Explore relevant jobs to your career</h2>
                  <p>Explore feed that knows what you need, based on your career interests, 
                    careerna will bring you what you are searching for</p>
                    @if(session('employee_token'))
                    <a href="{{route ('employee.main')}}" class="btn-get-started scrollto">Get Started</a>
                    @else
                    <a href="{{route ('allJobs')}}" class="btn-get-started scrollto">Get Started</a>
                    @endif
                  </div>
                <div class="col-lg-4 order-1 order-lg-2" data-aos="">
                  <div class="tab-content">
                    <div class="tab-pane active show" id="tab-1">
                      <figure>
                        <img src="assets/img/explore-desktop.png" alt="" class="img-fluid">
                      </figure>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row">
                <div class="col-lg-8 mt-2 mb-tg-0 ">
                  <i class="bi bi-card-checklist"></i><br><br>
                  <h1>Complete your profile to get your next job </h1>
                  <p>
                    Complete your profile with all information about you, academic background, 
                    career interests, previous jobs, achievements...etc.
                  </p>
                  @if(session('employee_token'))
                  <a href="{{route ('employee.show.completeProfile')}}" class="btn-get-started scrollto">Get Started</a>
                  @else
                  <a href="{{route ('employee.register.form')}}" class="btn-get-started scrollto">Get Started</a>
                  @endif
                </div>
                <div class="col-lg-4 order-1 order-lg-2" data-aos="">
                  <div class="tab-content">
                    <div class="tab-pane active show" id="tab-1">
                      <figure>
                        <img src="assets/img/complete.png" alt="" class="img-fluid">
                      </figure>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row">
                <div class="col-lg-9 mt-2 mb-tg-0 ">
                  <i class="bi bi-file-earmark"></i><br><br>
                  <h2>Apply by one click to the jobs</h2>
                  <p><b>Careerna</b> makes your next job one click away, find your next job, apply by 
                    one click and wait a contact from the employer.
                    </p>
                    @if(session('employee_token'))
                    <a href="{{route ('employee.main')}}" class="btn-get-started scrollto">Get Started</a>
                    @else
                    <a href="{{route ('employee.show.login.form')}}" class="btn-get-started scrollto">Get Started</a>
                    @endif
                </div>
                <div class="col-lg-3" data-aos="">
                  <div class="tab-content">
                    <div class="tab-pane active show" id="tab-1">
                      <figure>
                        <img src="assets/img/profile.png" alt="" class="img-fluid">
                      </figure>
                    </div>
                   
                  </div>
                </div>
              </div>
        
            </div>
           
          </div>
          <div class="controls">
            <a class="left carousel-control" href="#carouselExampleControls" data-slide="prev"><span
                class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#carouselExampleControls" data-slide="next"><span
                class="glyphicon glyphicon-chevron-right"></span></a>
            {{-- <a class="left carousel-control" href="#slideshow" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
           <a class="right carousel-control" href="#slideshow" data-slide="next"><i class="fa fa-chevron-right"></i></a> --}}

          </div>
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
        </div>
       
      </div>
    </section> 
  
  <!-- ======= Services Section ======= -->
  <section id="job" class="services section-bg mb-5">
    <div class="container">

      <div class="section-title">
        <h2 class="text-start">Latest Jobs</h2>
        <div class="line"></div>
      </div>
      <div class="row">
        @foreach ($latestJobs as $latestJob)
        <div class="col-md-6 col-lg-3">
          <div class="job">
            <h4 class="title"><a href="{{route ('jobDetails', [$latestJob->id])}}">{{$latestJob->title}}</a></h4>
            <p class="description">{{$latestJob->location}}</p>
            <p class="date">{{$latestJob->created_at->diffForHumans()}}</p>
          </div>
        </div>
        @endforeach

      </div>
      <a class="show-more" href="{{route ('allJobs')}}"> See all new jobs on CAREERNA...</a>

    </div>
  </section><!-- End Services Section -->
  
   <!-- ======= Contact Section ======= -->
   <section id="contact" class="contact mb-5">
    <div class="container">

      <div class="section-title">
        <h3><span>Contact Us</span></h3>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="info-box mb-4">
            <i class="bx bx-map"></i>
            <h3>Location</h3>
            <p>Almanshiya, Khartoum, Sudan</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-envelope"></i>
            <h3>Email:</h3>
            <p><a href="mailto:info@careerna.com ">info@careerna.com </a></p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx "></i>
            <h3>Follow Us</h3>
            <div class="social-links mt-3  ">
              <a href="https://www.twitter.com/Careerna_sd " class="twitter" target="_blank"><i
                  class="bx bxl-twitter"></i></a>
              <a href="https://www.facebook.com/CareernaSudan" class="facebook" target="_blank"><i
                  class="bx bxl-facebook"></i></a>
              <a href="https://www.instagram.com/careerna_sd/?hl=en" class="instagram" target="_blank"><i
                  class="bx bxl-instagram"></i></a>
              <a href="https://www.linkedin.com/company/careerna-sd " class="linkedin" target="_blank"><i
                  class="bx bxl-linkedin"></i></a>
            </div>
          </div>
        </div>

      </div>


    </div>

    </div>
  </section><!-- End Contact Section -->
  </main><!-- End #main -->
  @endsection


