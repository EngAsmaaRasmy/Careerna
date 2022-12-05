@extends('layouts.base ' ,['title'=>'CAREERNA| search for  a job'])  

@section("content")
 <!-- ======= Header ======= -->
 @include('layouts.header')
 <!-- End Header -->
    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container">
               <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                <div class="row">
                    @if ($jobs->isNotEmpty())
                        @foreach($jobs as $job)
                        <div class="info">
                            <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                                <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                    <div class="contents pt-4 pt-lg-0">
                                        <h3><a class="css-1v01ggk" target="_blank" href="{{route ('jobDetails', [$job->id])}}">{{$job->title}}</a> &nbsp; <span
                                                class="spanStye">{{$job->jobType->name}}</span></h3>
                                    </div>
                                    <div class="content1 pt-4 pt-lg-0">
                                        <p class="css-1d6m423 e1ojjapo4"><a target="_blank" class="css-1m8eti0 e1ojjapo1">{{$job->employer->name}}</a><span>- </span><span class="css-sfbcwm e1ojjapo3">{{$job->location}}</span></p>
                                        <p class="css-1uobp1k">
                                            

                                            {{$job->careerLevel->name}} · 7-10 Yrs of Exp · {{$job->category->name}} ·<br>
                                            Infrastructure as a Service ·Infrastructure Management · infrastucture ·
                                             <br> in {{$job->created_at->diffForHumans()}}
                                        </p>
                                        <hr>
                                        <form class="d-inline-block" action="{{route ('saveJob')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{$job->id}}" name="job_id">
                                            <button class="css-1x0pd2"><a class="css-1x0pd2 "><i
                                                class="bi-bookmark"></i>&nbsp;Save</a>&nbsp;&nbsp;</button>
                                        </form> 
                                        <button class="css-1x0pd2"><a href="" class="css-1x0pd2 "><i
                                                    class="bi-share"></i>&nbsp;Share</a>&nbsp;&nbsp;</button>
                                    </div>
                                </div>
                            </div>
                        </div>&nbsp;
                        @endforeach  
                    @else
                    <div class="info">
                        <div class="col-lg-12 col-md-4 d-flex align-items-stretch" data-aos="fade-right">
                            <div class="col-lg-12 d-flex flex-column justify-contents-center " data-aos="fade-left">
                                <div class="css-1yqi8st">
                                    <svg width="76" height="73" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><path id="no-result-illustration_svg__a" d="M.427.861h63V63.86h-63z"></path><path id="no-result-illustration_svg__c" d="M0 .234h19.953v19.958H0z"></path></defs><g fill="none" fill-rule="evenodd"><path fill="#8C99AA" d="M12.408 60.628l-1.4-1.648 9.602-8.162 1.399 1.648z"></path><path d="M19.99 31.093C21.01 18.373 32.153 8.888 44.872 9.91c12.721 1.022 22.206 12.163 21.185 24.884-1.023 12.72-12.163 22.204-24.884 21.183-12.721-1.021-22.205-12.163-21.183-24.883m-7.286-.585C11.36 47.25 23.844 61.915 40.587 63.26c16.745 1.344 31.41-11.139 32.753-27.883C74.686 18.633 62.203 3.97 45.458 2.625 28.714 1.279 14.05 13.763 12.704 30.508" fill="#FFF"></path><g transform="translate(11.096 .582)"><mask id="no-result-illustration_svg__b" fill="#fff"><use xlink:href="#no-result-illustration_svg__a"></use></mask><path d="M50.147 9.368a29.23 29.23 0 00-6.936-4.091l.832-1.998a31.44 31.44 0 017.451 4.396l-1.347 1.693zm4.993 5.059a29.815 29.815 0 00-2.528-2.865l1.527-1.533c.965.96 1.877 1.995 2.71 3.073l-1.709 1.325zM31.95 63.859c-.843 0-1.691-.033-2.546-.101-8.384-.674-16.007-4.572-21.462-10.98C2.49 46.373-.143 38.227.53 29.84c.674-8.387 4.574-16.008 10.979-21.462C17.917 2.924 26.076.292 34.447.964c2.116.172 4.213.552 6.233 1.134l-.599 2.078a29.562 29.562 0 00-5.807-1.054C18.135 1.795 3.982 13.89 2.688 30.012 2.059 37.824 4.51 45.41 9.59 51.376c5.078 5.968 12.176 9.597 19.986 10.224 16.14 1.317 30.294-10.767 31.59-26.89.505-6.295-.983-12.45-4.303-17.8l1.84-1.14c3.564 5.745 5.162 12.356 4.62 19.113C62 51.34 48.183 63.857 31.949 63.859z" fill="#8C99AA" mask="url(#no-result-illustration_svg__b)"></path></g><path fill="#DDE9F2" d="M18.428 61.977L8.362 70.535.58 61.379l10.066-8.557z"></path><g transform="translate(0 51.063)"><mask id="no-result-illustration_svg__d" fill="#fff"><use xlink:href="#no-result-illustration_svg__c"></use></mask><path fill="#8C99AA" mask="url(#no-result-illustration_svg__d)" d="M9.183 20.193l-1.4-1.649 9.12-7.754-6.381-7.505L1.4 11.038 0 9.391 10.77.234l9.183 10.804z"></path></g><path fill="#8C99AA" d="M11.205 68.502l-8.162-9.6 1.647-1.4 8.163 9.6z"></path></g></svg>
                                    <p class="css-1f19b85">No results found for the keyword  <span class="css-1gu9lf2"> “{{$search}}”</span>
                                    </p><p class="css-jog83m">Please check the spelling or use a general search keyword</p>
                                </div>
                            </div>
                        </div>
                    </div>&nbsp;
                    @endif 
                    </div>
                </div>
                <div class="section-title" data-aos="fade-up">
                </div>
            </div>
            </div>
        </section><!-- End About Section -->

    </main><!-- End #main -->
@endsection

 