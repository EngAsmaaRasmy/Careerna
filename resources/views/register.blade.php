@extends('layouts.base ' ,['title'=>'CAREERNA| Register as Employee'])

  <!-- ======= Hero Section ======= -->
  @section("content")

  <main id="main">
    <section id="contact" class="contact sections-bg">
        <div class="container text-right">

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
            
              <div class="col-lg-6 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-left">
                <form action="{{ route('employee.register') }}" method="POST" role="form" class="php-email-form">
                  {{ csrf_field() }}

                  <div class="row">
                    <h5 class="text-center">Sign Up and Start Applying For Jobs</h5><br><br>
                    {{-- <div class="form-group col-md-6">
                      <label for="name">First Name</label>
                      <input type="text" name="firstname" class="form-control"  required placeholder='&#xf007;'>
                    </div> --}}
                    {{-- <div class="form-group col-md-6 mt-3 mt-md-0">
                      <label for="name">Last Name</label>
                      <input type="text" class="form-control" name="lastname"  required placeholder='&#xf007;'>
                    </div> --}}
                  </div>
                  <div class="form-group mt-3">
                    <label for="name">Email</label>
                    <input type="email" class="form-control" name="email"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required placeholder='&#xf0e0;'>
                  </div>
                  <div class="form-group mt-3">
                    <label for="name">Password</label>
                    <input type="password" class="form-control" pattern=".{6,}" name="password" required placeholder='&#xf023;'>
                  </div>
                  <div class="form-group mt-3">
                    <label for="name">Password Confirmation</label>
                    <input type="password" class="form-control" pattern=".{6,}" name="password_confirmation" required placeholder='&#xf023;'>
                  </div>
                  
                  <div class="text-center"><button type="submit">Sign Up</button></div><hr>
                  <div class="text-center"> <p>Already on Carrerna? <a href="{{ route('employee.login.form') }}">Sign in</a></p></div>
                </form>
                
              </div>
            </div>
        </div>
      </section><!-- End Contact Section -->

  </main><!-- End #main -->
  @endsection

