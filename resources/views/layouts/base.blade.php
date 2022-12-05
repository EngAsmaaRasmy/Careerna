<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>
    @if(isset($title))
        {{ $title }}
    @endif 
 </title>
 <meta content="" name="description">
 <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
  <link rel="icon" href="{{ asset('assets/img/Favecine.jpg')}}" type="image/png">
  <meta name="description" content="">
  <meta name="viewport">

  <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/Year-Picke/yearpicker.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/multiselect/filter_multi_select.css')}}" rel="stylesheet">
   <!-- =======================================================
  * Font Awesome
  ======================================================== -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  @toastr_css

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Scaffold - v4.7.0
  * Template URL: https://bootstrapmade.com/scaffold-bootstrap-metro-style-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>



<body  onload="loodFunction()">
  <div id="loader"></div>
  <div id="myDiv" style="display:none;">
    @yield("content")
    <!-- ======= Footer ======= -->
    <footer id="footer" style="display:none;">
      <div class="footer-top">
        <div class="container">
          <div class="row">

            <div class="col-lg-4 col-md-6">
              <div class="footer-info">
                <h3>Careerna</h3>
                <p>
                  <strong>Address</strong> <br>
                  Almanshiya, Khartoum, Sudan<br><br>
                  <strong>Email: </strong><br>
                  <a href="mailto:info@careerna.com ">info@careerna.com </a><br>
                </p>
                <div class="social-links mt-3">
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

            <div class="col-lg-4 col-md-4 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="{{ url ('/') }}">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="{{route ('allJobs')}}">Jobs</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="{{ route ('employer') }}">Employer ?</a></li>
                <li><i class="bx bx-chevron-right"></i><a href="{{ route('employee.register.form') }}">Job Seeker ?</a></li>

              </ul>
            </div>
            <div class="col-lg-4 col-md-4 footer-newsletter">
              <h4>Careerna</h4>
              <p>
                Careerna is an innovative web-based employment marketplace. we provide businesses with
                smart hiring tools to find high qualified candidates. and provide jobs seekers with career
                resources that help them in their journey.
              </p>
            </div>

          </div>
        </div>
      </div>

      <div class="container">
        <div class="copyright">
          @2022 Careerna. All Rights Reserved. <strong><span>Owned by Careerna Technology</span></strong>.
        </div>
      </div>
    </footer><!-- End Footer -->

      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  </div>
  @include('layouts.script')

</body>

</html>