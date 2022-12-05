 <!-- ======= Header ======= -->
 @if(session('employee_token'))
 <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="logo me-auto">
            <h1><a href="{{route('employee.main')}}"><img src="{{ asset('./assets/img/Logo.png')}}" alt=""></a></h1>
        </div>

        <nav id="navbar" class="navbar order-last order-lg-0 text-left">
            <ul>

                <li><a class="nav-link scrollto {{ Request::is('employee') ? 'active' : '' }} " href="{{route('employee.main')}}">Explore</a></li>
                <li><a class="nav-link scrollto {{ Request::is('saved-jobs') ? 'active' : '' }}" href="{{route('savedJobs')}}">Saved <span type="info" class="css-1x0wra0 eoyjyou0">{{$count}}</span></a></li>
                <li><a class="nav-link scrollto {{ Request::is('applied-jobs') ? 'active' : '' }}" href="{{route('appliedJobs')}}">Applications</a></li>

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
                <div class="btn-wrap">
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
                            <li><a class="nav-link scrollto" href="{{route('employee.show.generalInfo', [$employee->id])}}">Edit Profile</a></li>
                            <li><a class="nav-link scrollto" href="{{route('employee.logout', [$employee->id])}}"> Log Out</a></li>
                        </ul>
                    </li>
                </div>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->


    </div>
</header><!-- End Header -->
@else
 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="logo me-auto">
            <h1><a href="{{ route ('home') }}"><img src="{{ asset('./assets/img/Logo.png')}}" alt=""></a></h1>
        </div>

        <nav id="navbar" class="navbar order-last order-lg-0 text-left">
            <ul>

               
                <div class="btn-wrap">
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
                <div class="btn-wrap">
                    <button class="btn btn-primary" onclick= "location.href='{{ route('site-jobs.index') }}'">View Jobs</button>
                </div>
                <div class="btn-wrap">
                    <button class="btn btn-primary" onclick= "location.href='{{ route('employer.main') }}'">Dashboard</button>
                  </div>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->


    </div>
</header><!-- End Header -->
@endif