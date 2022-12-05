@extends('layouts.base ' ,['title'=>'CAREERNA | Register as Employee'])

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
            <button class="btn btn-primary" onclick= "location.href='{{ route ('employer') }}'"> Employer?</button>
          </div>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
 

  <main id="main">
    <section id="contact" class="contact sections-bg">
        <div class="container">

            <div class="row padd">
              <div class="col-lg-6 d-flex flex-column justify-contents-center padds" data-aos="fade-left">
                <div class="content pt-4 pt-lg-0">
                  <h2>Find the Best Jobs in Sudan</h2><br>
                  <ul>
                    <li><i class="bi bi-check-circle-fill"></i> &nbsp; Apply for jobs easily.</li>
                    <li><i class="bi bi-check-circle-fill"></i> &nbsp; Receive alerts for the best jobs.</li>
                    <li><i class="bi bi-check-circle-fill"></i> &nbsp; Get discovered by top companies.</li>
                     <li><i class="bi bi-check-circle-fill"></i>&nbsp; Explore the right jobs & career opportunities.</li>
                  </ul>
                </div>
              </div>
            
              <div class="col-lg-5 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-left">
                <form action="{{ route('employee.register') }}" method="post" role="form" class="php-email-form">
                  {{ csrf_field() }}
                  <div class="row">
                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif
                    <h5 class="text-center">Sign Up and Start Applying For Jobs</h5><br><br>
                  </div>
                  <div class="form-group mt-3">
                    <label for="name">Email </label>
                    <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" 
                    title="Please enter a valid email address"
                    class="form-control @error("email") is-invalid @enderror" value="{{ old('email') }}" name="email" required placeholder='&#xf0e0;'>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group mt-3">
                    <label for="name">Password</label>
                    <input type="password" pattern=".{6,}" class="form-control @error("password") is-invalid @enderror"
                    title="Please enter at least 6 characters" name="password" required placeholder='&#xf023;'>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group mt-3">
                    <label for="name">Confirm your password</label>
                    <input type="password" pattern=".{6,}"
                    title="Please enter at least 6 characters" class="form-control @error("password_confirmation") is-invalid @enderror" name="password_confirmation" required placeholder='&#xf023;'>
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  
                  <div class="text-center"><button type="submit">Sign Up</button></div><hr>
                  <div class="text-center"> <p>Already on Carrerna? <a href="{{ route('employee.show.login.form') }}">Sign in</a></p></div>
                </form>
                
              </div>
            </div>
        </div>
      </section><!-- End Contact Section -->

  </main><!-- End #main -->
  @endsection

