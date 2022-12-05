 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <div class="logo me-auto">
        <h1><a href="{{ url ('/') }}"><img src="{{ asset('./assets/img/Logo.png')}}" alt=""></a></h1>
      </div>
      <div class="btn-wrap mt-2">
        <form action="{{route ('search')}}" method="POST">
          {{ csrf_field() }}
            <div class="input-group rounded">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" name="search" />
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fa fa-search"></i>
                </span>
            </div>
        </form>
    </div>
  
      <nav id="navbar" class="navbar order-last order-lg-0">
        @if(session('employee_token'))
        <div class="btn-wrap">
          <ul>
            <li class="dropdown dropdown-menu-right"><a href="#"><span>
              @isset($employee->personalDetail->image)
                    <figure class="avatar mr-2 avatar-xl">
                        <img src="{{asset('uploads/employees/'.$employee->personalDetail->image)}}" alt="...">
                        <i class="avatar-presence online"></i>
                    </figure>
                    @endisset
                    <figure class="avatar mr-2 avatar-xl">
                        <img src="{{ asset('./assets/img/avatar.png')}}" alt="...">
                        <i class="avatar-presence online"></i>
                    </figure>
                    </span>
                </a>
                <ul>
                    <li><a class="nav-link scrollto" href="{{route('employee.main')}}">Dashbord</a></li>
                    <li><a class="nav-link scrollto" href="{{route('employee.logout', [$employee->id])}}"> Log Out</a></li>
                </ul>
            </li>
        </ul>
      </div>
        @elseif(session('employer_token'))
        <div class="btn-wrap">
          <ul>
            <li class="dropdown dropdown-menu-right"><a href="#"><span>
              @isset($employer->logo)
                <figure class="avatar mx-5 avatar-xl">
                    <img src="{{asset('uploads/employers/'.$employer->logo)}}" alt="...">
                    <i class="avatar-presence online"></i>
                </figure>
              @endisset
              <figure class="avatar mr-2 avatar-xl">
                <img src="{{ asset('./assets/img/avatar.png')}}" alt="...">
                <i class="avatar-presence online"></i>
            </figure>
            </span>
                </a>
                <ul>
                    <li><a class="nav-link scrollto" href="{{route('employer.main')}}">Dashbord</a></li>
                    <li><a class="nav-link scrollto" href="{{route('employer.logout')}}"> Log Out</a></li>
                </ul>
            </li>
          </ul>
          
      </div>
        @else
        <ul>
          <a class="nav-link scrollto co1" href="{{ route('employee.show.login.form') }}">Login</a>
          <div class="btn-wrap">
            <button class="btn btn-primary" onclick= "location.href='{{ route('employee.register.form') }}'"> Join Now</button>
          </div>
          <div class="btn-wrap">
            <button class="btn btn-success" onclick= "location.href='{{ route ('employer') }}'"> Employer?</button>
          </div>
        </ul>
        @endif
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
  
  
    </div>
  </header><!-- End Header -->