@extends('layouts.base ' ,['title'=>'CAREERNA | Jobs of : '.$employer->title ?? ''])
@section("content")
    <!-- ======= Header ======= -->
    @include('layouts.employer-header')
    <!-- End Header -->


    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container">
               <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <h1 class="style">View All Jobs</h1>

                        </div>
                        @foreach($jobs as $job)
                        <div class="info">
                            <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                    <div class="contents pt-4 pt-lg-0">
                                        <h3><a href="{{ route('employer.showJob', [$job->id]) }}">{{$job->title}}</a> &nbsp; <span
                                                class="spanStye">{{$job->jobType->name}}</span></h3>
                                    </div>
                                    <div class="content1 pt-4 pt-lg-0">

                                        <p class="css-1uobp1k">
                                            {{$job->category->name}}<br>
                                            {{$job->created_at->diffForHumans()}}<br>
                                        </p>
                                        <hr>
                                        <button class="css-1x0pd2">
                                            <a class="css-1x0pd2 " href="{{ route('employer.showJob', [$job->id]) }}"><i
                                            class="bi bi-eye"></i>&nbsp;Show</a>&nbsp;&nbsp;</button> 
                                        <button class="css-1x0pd2">
                                            <a class="css-1x0pd2 " href="{{ route('employer.editJob', [$job->id]) }}"><i
                                            class="bi bi-pencil-square"></i>&nbsp;Edit</a>&nbsp;&nbsp;</button> 
                                        <button class="css-1x0pd2" data-toggle="modal" data-target="#deleteModal{{$job->id}}"><a class="css-1x0pd2 "><i
                                        class="bi-trash-fill"></i>&nbsp;Delete</a>&nbsp;&nbsp;</button>
                                    </div>
                                </div>
                            </div>
                        </div>&nbsp;
                            <!-- Modal -->
                        <div class="modal fade" id="deleteModal{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete {{$job->title}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form action="{{ route('site-jobs.destroy', 'test') }}" method="post">
                                    {{method_field('DELETE')}}
                                    {{csrf_field()  }}
                                    <div class="modal-body py-3">
                                        <input type="hidden" name="id" value="{{ $job->id }}">
                                        <h5>Are you Sure you want to delete 
                                            <br>{{ $job->title }}</h5>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
                <div class="section-title" data-aos="fade-up">
                </div>
            </div>
            </div>
        </section><!-- End About Section -->
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script src="{{ asset('assets/js/myScript.js')}}"></script>
        <script type='text/javascript'
            src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'>
        </script>

    </main><!-- End #main -->
@endsection

