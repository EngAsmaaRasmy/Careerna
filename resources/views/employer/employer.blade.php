
@extends('layouts.base ' ,['title'=>'CAREERNA | Employer'])

@section("content")
<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center">

    <div class="logo me-auto">
      <h1><a href="{{ url ('/') }}"><img src="{{ asset('./assets/img/Logo.png')}}" alt=""></a></h1>
    </div>

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <div class="btn-wrap">
          <button class="btn btn-primary" onclick= "location.href='{{ route('employee.show.login.form') }}'">Job Seeker?</button>
        </div>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>

  </div>
</header>
<!-- End Header -->
  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center"
          data-aos="fade-up">
          <div class="text-center">
            <h1> Transform the way you're hiring</h1>
            <h2>A New, Smart, Better way to find qualified candidates for your company in Sudan.</h2>
            <a href="{{ route('employer.show.register.form') }}" class="btn-get-started scrollto ">Start hiring now</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
          <img src="{{ asset('assets/img/empback.png')}}" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
  <br><br><br><br><br>
  <main id="main">
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
        <div id="carouselExampleControls" class="carousel slide">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                <div class="col-lg-8 mt-2 mb-tg-0 ">
                  <i class="bi bi-search"></i><br><br>
                  <h2>Receive high-quality applicants for the job.
                  </h2>
                  <p>With  careerna smart system, your job post will only appear for highly 
                    qualified candidates so you will not receive irrelevant candidates anymore.</p>
                    <a href="{{ route('employer.show.register.form') }}" class="btn btn-primary scrollto">Get Started</a> 
                </div>
                <div class="col-lg-4 order-1 order-lg-2" data-aos="">
                  <div class="tab-content">
                    <div class="tab-pane active show" id="tab-1">
                      <figure>
                        <img src="{{ asset('assets/img/image3.png')}}" alt="" class="img-fluid">
                      </figure>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row">
                <div class="col-lg-8 mt-2 mb-tg-0 ">
                  <i class="bi bi-headset"></i><br><br>
                  <h1>Register your company and post jobs in 3 minutes. </h1>
                  <p>
                    With careerna's simple hiring process you can create your company profile and 
                    start posting jobs to get qualified candidates in just 3 minutes and save your time.
                  </p>
                  <a href="{{ route('employer.show.register.form') }}" class="btn btn-primary scrollto">Get Started</a>
                </div>
                <div class="col-lg-4 order-1 order-lg-2" data-aos="">
                  <div class="tab-content">
                    <div class="tab-pane active show" id="tab-1">
                      <figure>
                        <img src="{{ asset('assets/img/image2.jpg')}}" alt="" class="img-fluid">
                      </figure>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row">
                <div class="col-lg-9 mt-2 mb-tg-0 ">
                  <i class="bi bi-funnel"></i><br><br>
                  <h2>Receive high-quality applicants for the job.
                  </h2>
                  <p>With  careerna smart system, your job post will only appear for highly qualified 
                    candidates so you will not receive irrelevant candidates anymore.
                  </p>
                  <a href="{{ route('employer.show.register.form') }}" class="btn btn-primary scrollto">Get Started</a>
                </div>
                <div class="col-lg-3" data-aos="">
                  <div class="tab-content">
                    <div class="tab-pane active show" id="tab-1">
                      <figure>
                        <img src="{{ asset('assets/img/image3.png')}}" alt="" class="img-fluid">
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
    <br><br><br><br><br>
    <section id="about" class="features">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mt-2 mb-tg-0">
            <div class="contentes1 pt-4 pt-lg-0">
              <i class="bi bi-bar-chart-steps"></i><br><br>
              <h4>Dedicated recruitment support to find great candidates.</h4>
              <p>
                Your success & growth is ours! Careerna provides every employer with a specialized, 
                dedicated recruitment consultant to help you through your hiring process till it ends.
              </p>
              <a href="{{ route('employer.show.register.form') }}" class="btn btn-primary scrollto">Get Started</a>

            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2" data-aos="">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <figure>
                  <img src="{{ asset('assets/img/image4.png')}}" alt="" class="img-fluid">
                </figure>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- ======= About Section ======= -->

    

  </main><!-- End #main -->
  @endsection
