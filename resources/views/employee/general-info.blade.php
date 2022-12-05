@extends('layouts.base ' ,['title'=>'CAREERNA | general info'])  
@section("content")
   <!-- ======= Header ======= -->
   @include('layouts.employee-header')
    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container">
                <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="">
                            <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                    <div class="content1 pt-4 pt-lg-0">
                                        <aside class="">
                                            <nav class="sidebar">
                                              <a class="sidebar__list-item {{ Request::is('employee/general-info/'.$employee->id) ? 'active' : '' }}" href="{{route('employee.show.generalInfo',[$employee->id])}}">General
                                                Information</a>
                                            <a class="sidebar__list-item {{ Request::is('employee/education-info'.$employee->id) ? 'active' : '' }}" href="{{route('employee.show.educationInfo',[$employee->id])}}">Education</a>
                                            <a class="sidebar__list-item {{ Request::is('employee/career-info'.$employee->id) ? 'active' : '' }}" href="{{route('employee.show.careerInfo',[$employee->id])}}">Career
                                                Interest</a>
                                                <a class="sidebar__list-item {{ Request::is('employee/skills-info'.$employee->id) ? 'active' : '' }}" href="{{route('employee.show.skillsInfo',[$employee->id])}}">Skills and Languages
                                                    </a>
                                                    @if(session('employee_token'))
                                                    <a class="sidebar__list-item {{ Request::is('employee/update-cv'.$employee->id) ? 'active' : '' }}" href="{{route('employee.show.uploadCV',[$employee->id])}}">Upload CV</a>
                                                    @endif
                                            </nav>
                                          </aside>
                                    </div>
                                </div>
                            </div>
                        </div>&nbsp;
                    </div>
                    <div class="col-md-8">
                        @include("alert.success")
                        @include("alert.error")
                    <form id="personal"  action="{{ route('employee.updateGeneralInfo' , [$employee->id]) }}"
                        method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if(session('employee_token'))
                        <div class="wrapper">
                            <div class="profile">
                                <div class="row">
                                    @if($employee->personalDetail->image)
                                    <div class="col-lg-3">
                                        <img src="{{asset('uploads/employees/'.$employee->personalDetail->image)}}" alt="" class="thumbnail">
                                    </div>
                                    @else
                                    <div class="col-lg-3">
                                        <img src="{{ asset('assets/img/avatar.png')}}" alt="" class="thumbnail">
                                    </div>
                                    @endif
                                    @if(session('employee_token'))
                                    <div class="col-lg-8">
                                        <h2 class="css-1li3g6j eclq2bk2">Profile Photo</h2>
                                        <span class="userphoto__description">You can upload a .jpg, .png, or .gif photo with max size of 5MB.</span>
                                        <br><br>
                                        <input type="file" accept=".jpg, .jpeg, .png, .gif" name="image" id="profile-photo-file" class="css-khsv9a e161llcf1">
                                        <label class="userphoto__upload-btn css-1tmeftp e161llcf0" for="profile-photo-file">Change Photo</label>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                    <h3 style="color: #093adc ">General Information</h3>

                                    <div class="content1 pt-4 pt-lg-0">

                                        <div class="row">

                                            <div class="form-group col-md-6">
                                                <label for="name" class="css-1xujd69">First Name <span class="colo">*</span></label>
                                                <input type="text" name="first_name" class="form-control" required
                                                    placeholder='&#xf007;' value="{{old('first_name' ,$employee->personalDetail->first_name)}}">
                                            </div>
                                            <div class="form-group col-md-6 mt-3 mt-md-0">
                                                <label for="name" class="css-1xujd69">Last Name <span class="colo">*</span></label>
                                                <input type="text" class="form-control" name="last_name" required
                                                    placeholder='&#xf007;' value="{{old('last_name' ,$employee->personalDetail->last_name)}}">
                                            </div>
                                        </div>
                                        <div class="row"> 
                                            <div class="form-group col-md-6 mt-3">
                                                <label for="name" class="css-1xujd69">Date of Birth <span class="colo">*</span> </label>
                                                <input type="date" class="form-control" name="data_of_birth" required
                                                    placeholder='{{ date('Y-m-d',strtotime($employee->personalDetail->data_of_birth)) }}' value="{{ date('Y-m-d',strtotime($employee->personalDetail->data_of_birth)) }}">
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label  class="css-1xujd69" for="name">Gender</label><br>
                                            <div class="custom-control custom-radio custom-control-inline" >
                                              <input type="radio" id="customRadioInline1" name="gender" value="male"
                                              {{ $employee->personalDetail->gender == 'male' ? 'checked' : ''}} class="custom-control-input">
                                              <label class="custom-control-label" for="customRadioInline1"><i
                                                  class=" bi-gender-male"></i>Male</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                              <input type="radio" id="customRadioInline2" name="gender" value="female"
                                              {{ $employee->personalDetail->gender == 'female' ? 'checked' : ''}} class="custom-control-input">
                                              <label class="custom-control-label" for="customRadioInline2"><i
                                                  class=" bi-gender-female"></i>Female</label>
                                            </div>
                                          </div>

                                    </div>
                                </div>
                            </div>
                        </div>&nbsp;
                        <div class="info">
                            <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                    <h3 style="color: #093adc ">Location</h3>

                                    <div class="row">
                                          <div class="form-group col-md-6 mt-3">
                                          <label  class="css-1xujd69" for="name">Country <span class="colo">*</span> </label>
                                          <select class="form-select" aria-label="Default select example" required id="country" name="country_id">
                                            <option selected >select Country</option>
                                            @foreach($countries as $country)
                                            <option value="{{$country->id}}" {{$employee->personalDetail->country_id == $country->id  ? 'selected' : ''}}>{{$country->name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                        <div class="form-group mt-3 col-md-6">
                                          <label  class="css-1xujd69" for="name">City <span class="colo">*</span> </label>
                                          <select class="form-select" aria-label="Default select example" required id="city" name="city_id">
                                            <option selected >select City</option>
                                            @foreach($cities as $city)
                                            <option value="{{$city->id}}"  {{$employee->personalDetail->city_id == $city->id  ? 'selected' : ''}}>{{$city->name}}</option>
                                            @endforeach
                                        </select>
            
                                        </div>
                                      </div>

                                </div>
                            </div>
                        </div>&nbsp;
                        <div class="info">
                            <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                    <h3 style="color: #093adc ">Contact info</h3>
                                    <div class="contents pt-4 pt-lg-0">
                                      <div class="form-group mt-3">
                                        <label class="css-1xujd69" for="name">Mobile Number <span class="colo">*</span> </label>
                                        <input value="{{$employee->contactDetail->phone}}" type="phone" class="form-control" name="phone" required placeholder='&#xf095;'>
                                      </div>
                                      <div class="form-group mt-3">
                                        <label class="css-1xujd69"for="name">Alternative Number </label>
                                        <input value="{{$employee->contactDetail->another_phone}}" type="phone" class="form-control" name="another_phone" placeholder='&#xf095;'>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>&nbsp;
                        
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-3">Save</button>
                        </div>
                        @else
                        <div class="info">
                            <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                    <h3 style="color: #093adc ">General Information</h3>

                                    <div class="content1 pt-4 pt-lg-0">

                                        <div class="wrapper">
                                            <div class="profile">
                                                <div class="row">
                                                    @if($employee->personalDetail->image)
                                                    <div class="col-lg-3">
                                                        <img src="{{asset('uploads/employees/'.$employee->personalDetail->image)}}" class="thumbnail">
                                                    </div>
                                                    @else
                                                    <div class="col-lg-3">
                                                        <img src="{{ asset('assets/img/avatar.png')}}" alt="" class="thumbnail">
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                            <div>
                                                <span class="spanStyle">Name:</span>
                                                <span class="css-1xujd69">{{$employee->personalDetail->first_name}} {{$employee->personalDetail->last_name}}</span>
                                            </div>
                                            <div>
                                                <span class="spanStyle">Date of Birth:</span>
                                                <span class="css-1xujd69">{{$employee->personalDetail->data_of_birth}}</span>
                                            </div>
                                            <div>
                                                <span class="spanStyle">Gender:</span>
                                                <span class="css-1xujd69">{{$employee->personalDetail->gender}}</span>
                                            </div>
                                            <div>
                                                <span class="spanStyle">Address:</span>
                                                <span class="css-1xujd69">{{$country[0]}} - {{$city[0]}}</span>
                                            </div>
                                            <div>
                                                <span class="spanStyle">Phone Number:</span>
                                                <span class="css-1xujd69">{{$employee->contactDetail->phone}}</span>
                                            </div>
                                            <div>
                                                <span class="spanStyle">Another Phone :</span>
                                                <span class="css-1xujd69">{{$employee->contactDetail->another_phone}}</span>
                                            </div>
                                            <style>
                                                .content1 span {
                                                    font-size: 1rem !important;
                                                }
                                            </style>

                                    </div>
                                </div>
                            </div>
                        </div>&nbsp;
                        @endif

                    </form>
                    </div>
                </div>
                <div class="section-title" data-aos="fade-up">
                </div>
            </div>
            </div>
        </section><!-- End About Section -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
          $(document).ready(function () {
              $('#country').on('change', function () {
                  var idCountry = this.value;
                  $("#city").html('');
                  $.ajax({
                      url: "{{url('/fetch-cities')}}",
                      type: "POST",
                      data: {
                          country_id: idCountry,
                          _token: '{{csrf_token()}}'
                      },
                      dataType: 'json',
                      success: function (result) {
                          $('#city').html('<option value="">Select State</option>');
                          $.each(result.cities, function (key, value) {
                              $("#city").append('<option value="' + value
                                  .id + '">' + value.name + '</option>');
                          });
                      }
                  });
              });
          });
      </script>
    </main><!-- End #main -->
@endsection
