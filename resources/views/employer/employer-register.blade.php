@extends('layouts.base ' ,['title'=>'CAREERNA | Register Employer Account'])
@section("content")
    <main id="main">
        <section id="contact" class="contact" style="padding: 30px 0px">
                <div class="row" style="margin: 0px">
                    <div class="col-lg-6 d-flex flex-column justify-contents-center  back" >
                        <header id="header" class="fixed-top d-flex align-items-center">
                            <div class="container d-flex align-items-center">
                    
                                <div class="logo me-auto">
                                    <h1><a href="{{ url ('/') }}"><img src="{{ asset('./assets/img/Logo.png')}}" alt=""></a></h1>
                                </div>
                                <br>
                            </div>
                        </header> <br><br>
                        
                        <form action="{{ route('employer.register') }}" method="post" role="form" class="php-email-form padd">
                            {{ csrf_field() }}
                            <p class=""> Looking for a job<a href="{{ route('employee.register.form') }}">  Sign up as a job seeker</a></p>
                            <hr>
                                @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                                @endif
                            <h1>Create a Company Account to Start Hiring Now</h1>
                            <br><br>
                            <div class="form-group  mt-3 mt-md-0">
                            <label for="name">Business email</label>
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
                                <label for="name">Create your password</label>
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
                                <input type="password" pattern=".{6,}" class="form-control @error("password_confirmation") is-invalid @enderror"
                                title="Please enter at least 6 characters" name="password_confirmation" required placeholder='&#xf023;'>
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="text-center"><button type="submit" class="btn btn-primary btn-lg btn-block">Create Company Account</button></div><hr>
                            <div class="text-center"> <p>Already on Carrerna? <a href="{{ route('employer.show.login.form') }}">Sign in</a></p></div>
                        </form>
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-contents-center padds sections-bg">
                        
                        <div class="text-right" >
                            <button type="button" onclick= "location.href='{{ route('employee.show.login.form') }}'" class="btn btn-user btn-lg">Searching for Jobs?</button></div><hr>
                        <div class="padd ">
                            <div class="content pt-4 pt-lg-0">
                                <h2>Find the Best Jobs in Sudan</h2><br>
                                <ul>
                                    <li><i class="bi bi-check-circle-fill"></i> &nbsp; Reach the best qualified candidates.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> &nbsp; Easily post professionally written jobs.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> &nbsp; Hire top talent faster and smarter.</li>
                                    <li><i class="bi bi-check-circle-fill"></i>&nbsp; Get personalized recruitment support.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-5 mt-lg-0 d-flex align-items-stretch">
                    </div>
                </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
