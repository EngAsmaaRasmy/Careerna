@extends('layouts.base ' ,['title'=>'CAREERNA | Complete Employer Profile'])

@section("content")
@include('layouts.employer-header')

  <!-- ======= Hero Section ======= -->

  <main id="main">
    <section id="contact" class="contact ">
        <div class="container py-5 h-170">
            <div class="row d-flex justify-content-center align-items-center h-170">
                <h1 class="text-center"> One last step</h1>
                <p class="text-center">Please Provide us with some basic information to get you started.</p>
              <div class="col-12 col-md-8 col-lg-7 col-xl-7">
                @include("alert.success")
                @include("alert.error")
                <form action="{{ route('employer.completeProfile' , [$employer->id]) }}" id="employer_complete_profile"
                    method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                  {{csrf_field() }}  
                  <div class="row">
                      <div class="form-group col-md-6">
                        <label class="css-1xujd68" for="name">First Name <span class="colo">*</span></label>
                        <input type="text" id="first_name" name="first_name" value="{{ old('first_name', '') }}" class="form-control @error("first_name") is-invalid @enderror"  required placeholder='&#xf007;'>
                      </div>
                      <div class="form-group col-md-6 mt-3 mt-md-0">
                        <label class="css-1xujd68" for="name">Last Name <span class="colo">*</span></label>
                        <input type="text" class="form-control @error("last_name") is-invalid @enderror" value="{{ old('last_name', '') }}" name="last_name"  required placeholder='&#xf007;'>
                      </div>
                    </div>
                    <div class="form-group mt-3">
                      <label class="css-1xujd68" for="name">Title <span class="colo">*</span></label>
                      <input type="text" class="form-control @error("title") is-invalid @enderror" value="{{ old('title', '') }}" name="title" required placeholder='e.g.: CEO, HR officer, Recruitment Specialist'>
                    </div>
                    <div class="form-group mt-3">
                      <label class="css-1xujd68" for="name">Company Name <span class="colo">*</span></label>
                      <input type="text" class="form-control @error("name") is-invalid @enderror" value="{{ old('name', '') }}" name="name" required placeholder='&#xf044;'>
                    </div>
                    <div class="form-group mb-3 col-md-12">
                      <label class="css-1xujd68">What are company industries?
                        <span class="css-teaycm e7oqu6k0">— Add at least 3</span> <span class="colo">*</span></label>
                        <br>
                      <select class="form-control industries" id="industries" multiple required name="industries[]">
                        @foreach($industries as $id => $industries)
                          <option value="{{ $id }}" {{ in_array($id, old('industries', [])) ? 'selected' : '' }}>{{ $industries }}</option>
                       @endforeach
                       
                      </select>
                      
                    </div>
                    <span id="error" class="text-danger" style="display: none; font-size: 13px;">Please choose at least three</span>
                    <style type="text/css">
                      /* Important part */
                      .modal-dialog{
                          overflow-y: initial !important
                      }
                      .modal-content{
                          height: 90vh;
                          width: 150vh;
                          overflow-y: auto;
                      }
                  </style>
                    <div class="form-group mt-3">
                      <label class="css-1xujd68" for="name">Company Description <span class="colo">*</span></label>
                      <textarea class="ckeditor form-control @error("description") is-invalid @enderror" name="description" required></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label class="css-1xujd68" for="name">Employee Size <span class="colo">*</span> </label>
                        <select class="form-select" name="employer_size" aria-label="Default select example" required>
                          <option selected value="1" {{old('employer_size') == "1"  ? 'selected' : ''}}>1-11 Employees</option>
                          <option value="2" {{old('employer_size') == "2"  ? 'selected' : ''}}>11-50 Employees</option>
                          <option value="3" {{old('employer_size') == "3"  ? 'selected' : ''}}>51-100 Employees</option>
                          <option value="4" {{old('employer_size') == "4"  ? 'selected' : ''}}>101-500 Employees</option>
                          <option value="5" {{old('employer_size') == "5"  ? 'selected' : ''}}>101-500 Employees</option>
                          <option value="6" {{old('employer_size') == "5"  ? 'selected' : ''}}>501-1000 Employees</option>
                          <option value="7" {{old('employer_size') == "7"  ? 'selected' : ''}}>More than 1000 Employees</option>
                        </select>
                      </div>
                      <div class="css-1xujd68" class="form-group mt-3">
                        <label for="name">Country <span class="colo">*</span> </label>
                        <select class="form-select" aria-label="Default select example" required id="country" name="country">
                          <option selected >select Country</option>
                          @foreach($countries as $country)
                          <option value="{{$country->id}}" {{old('country') == $country->id  ? 'selected' : ''}}>{{$country->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group mt-3">
                        <label class="css-1xujd68" for="name">Phone <span class="colo">*</span></label>
                        <input type="phone" class="form-control"  value="{{ old('phone', '') }}" name="phone" required placeholder='&#xf095;'>
                      </div>
                      <div class="form-group mt-3">
                        <label class="css-1xujd68" for="name">Logo <span class="colo">*</span></label>
                        <input type="file" class="form-control"  value="{{ old('logo', '') }}"  name="logo" required placeholder='&#xf0ac;'>
                      </div>
                      <div class="form-group mt-3">
                        <label class="css-1xujd68" for="name">Websit </label>
                        <input type="text" class="form-control"  value="{{ old('website', '') }}" name="website">
                      </div>
                      <div class="text-center"><button type="submit" class="btn btn-primary btn btn-block">Create Company Account</button></div>
                  </form>
              </div>
            </div>
          </div>
      </section><!-- End Contact Section -->
      <script>
        $(document).ready(function () {
          const industries = $('.industries').filterMultiSelect({
              // displayed when no options are selected
              placeholderText: "select Job Titles",
              // placeholder for search field
              filterText: "search for job title",
              // Select All text

              selectAllText: "Select All",
              // determine if is case sensitive
              caseSensitive: false,

          });
        });
      </script>
  </main><!-- End #main -->
@endsection

  