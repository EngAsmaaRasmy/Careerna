@extends('layouts.base ' ,['title'=>'CAREERNA | Complete Employer Profile'])

@section("content")
  <!-- ======= Header ======= -->
  @include('layouts.employer-header')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->

  <main id="main">
    <section id="contact" class="contact ">
        <div class="container py-5 h-170">
            <div class="row d-flex justify-content-center align-items-center h-170">
                <h1 class="text-center"> Update Your Profile </h1>
                <br>
              <div class="col-12 col-md-8 col-lg-7 col-xl-7">
                @include("alert.success")
                @include("alert.error")
                <form action="{{ route('employer.updateProfile' , [$employer->id]) }}"  method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                  {{csrf_field() }}  
                  <div class="row">
                      <div class="form-group col-md-6">
                        <label class="css-1xujd68" for="name">First Name <span class="colo">*</span></label>
                        <input type="text" name="first_name" value="{{ $employer->first_name}}"  class="form-control"  required placeholder='&#xf007;'>
                      </div>
                      <div class="form-group col-md-6 mt-3 mt-md-0">
                        <label class="css-1xujd68" for="name">Last Name <span class="colo">*</span></label>
                        <input type="text" class="form-control" value="{{ $employer->last_name}}" name="last_name"  required placeholder='&#xf007;'>
                      </div>
                    </div>
                    <div class="form-group mt-3">
                      <label class="css-1xujd68" for="name">Title <span class="colo">*</span></label>
                      <input type="text" class="form-control" value="{{ $employer->title}}" name="title" required placeholder='&#xf044;'>
                    </div>
                    <div class="form-group mt-3">
                      <label class="css-1xujd68" for="name">Company Name <span class="colo">*</span></label>
                      <input type="text" class="form-control" value="{{ $employer->name}}" name="name" required placeholder='&#xf044;'>
                    </div>
                    <div class="form-group mt-3">
                      <label class="css-1xujd68" for="name">Description <span class="colo">*</span></label>
                      <textarea class="ckeditor form-control" value="{{ $employer->description}}" name="description">{{ $employer->description}}</textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label class="css-1xujd68" for="name">Employee Size <span class="colo">*</span></label>
                        <select class="form-select" name="employer_size" aria-label="Default select example" required>
                          <option  value="1" {{ $employer->employer_size == '1' ? 'selected' : ''}}>1-11 Employees</option>
                          <option value="2" {{ $employer->employer_size == '2' ? 'selected' : ''}}>11-50 Employees</option>
                          <option value="3" {{ $employer->employer_size == '3' ? 'selected' : ''}}>51-100 Employees</option>
                          <option value="4" {{ $employer->employer_size == '4' ? 'selected' : ''}}>101-500 Employees</option>
                          <option value="5" {{ $employer->employer_size == '5' ? 'selected' : ''}}>501-1000 Employees</option>
                          <option value="6" {{ $employer->employer_size == '6' ? 'selected' : ''}}>More than 1000 Employees</option>
                        </select>
                      </div>
                      <div class="form-group mt-3">
                        <label class="css-1xujd68"  for="name">Country  <span class="colo">*</span></label>
                        <select class="form-select" name="country" aria-label="Default select example" required>
                          @foreach($countries as $country)
                              <option value="{{$country->id}}" {{$employer->country == $country->id  ? 'selected' : ''}}>{{$country->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group mt-3">
                        <label class="css-1xujd68" for="name">Phone <span class="colo">*</span></label>
                        <input type="phone" class="form-control" value="{{ $employer->phone}}" name="phone" required placeholder='&#xf095;'>
                      </div>
                      <div class="form-group mt-3">
                        <label class="css-1xujd68" for="name" class="mr-3">Logo </label>
                        <img src="{{asset('uploads/employers/'.$employer->logo)}}" alt="employer logo"   width="100" height="100" style="border-radius: 50%">
                        <br><br>
                        <label class="css-1xujd68" for="name">Change Logo </label>
                        <input type="file" class="form-control" name="logo"  placeholder='&#xf0ac;'>
                      </div>
                      <div class="form-group mt-3">
                        <label class="css-1xujd68" for="name">Websit </label>
                        <input type="text" class="form-control" value="{{ $employer->website}}"  name="website">
                      </div>
                      <div class="text-center"><button type="submit" class="btn btn-primary btn btn-block">Update Company Account</button></div>
                  </form>
              </div>
            </div>
          </div>
      </section><!-- End Contact Section -->

  </main><!-- End #main -->
@endsection
  