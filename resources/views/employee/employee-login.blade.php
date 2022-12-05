@extends('layouts.base ' ,['title'=>'CAREERNA| Log in as Employee'])
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
      </nav>

    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
 

  <main id="main">
    <section id="contact" class="contact sections-bg">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-12 col-md-8 col-lg-6 col-xl-6">
                        <form action="{{ route('employee.login') }}" method="post" role="form" class="php-email-form">
                          {{ csrf_field() }}
                            <h5 class="text-center"> Welcome Back</h5><br><br>
                            <div class="form-group  mt-3 mt-md-0">
                            <label for="name">Your Email</label>
                            <input type="email" class="form-control  @error("email") is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" required placeholder='&#xf0e0;'>
                            </div>
                            
                        <div class="form-group mt-3">
                            <label for="name">Password</label>
                            <input type="password" class="form-control" name="password" id="subject" required placeholder='&#xf023;'>
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button></div><hr>
                        <div class="text-center"> <p>New to Carrerna? <a href="{{ route('employee.register.form') }}"> Join now</a></p></div>
                        </form>
              </div>
            </div>
          </div>
      </section><!-- End Contact Section -->

  </main><!-- End #main -->
  @endsection


