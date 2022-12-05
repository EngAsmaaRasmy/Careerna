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