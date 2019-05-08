<div class="popular_courses section_gap_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="main_title">
                    <h2 class="mb-3">@lang('lang.courses.title')</h2>
                    <p>
                        @lang('lang.courses.subTitle')
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4">
                <nav>
                    <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">@lang('lang.courses.allCourses')</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">@lang('lang.courses.myCourses')</a>
                    </div>
                </nav>
            </div>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                <div class="row">
                    <!-- single course -->

                    <div class="col-lg-12">
                        <div class="row">
                            @php
                                $counter = 0;
                            @endphp
                            @foreach($courses as $course)
                                @if($counter == 0)
                                    <div class="row mb-3">
                                @endif
                                        @php
                                            $counter++;
                                        @endphp
                                        <div class="col-lg-4 single_course">
                                            <div class="course_head">
                                                <img class="img-fluid" src="{{asset('img/courses/' . $course->id . '/' . $course->img)}}" alt="" />
                                            </div>
                                            <div class="course_content">
                                                <a href="{{$course->category->url}}"><span class="tag mb-4 d-inline-block">{{$course->category->title}}</span></a>
                                                <h4 class="mb-3">
                                                    <a href="{{'/' . $course->url}}">{{$course->title}}</a>
                                                </h4>
                                                <p>
                                                    {{ mb_substr($course->desc, 0, 100) . '...' }}
                                                </p>
                                            </div>
                                        </div>
                                @if($counter == 3)
                                    </div>
                                    @php
                                        $counter = 0;
                                    @endphp
                                @endif
                            @endforeach
                        </div><br />
                    </div>
                </div>

                @include('courses.pagination')

            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                <div class="row">
                    <!-- single course -->

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4 single_course">
                                <div class="course_head">
                                    <img class="img-fluid" src="img/courses/c1.jpg" alt="" />
                                </div>
                                <div class="course_content">
                                    <a href="#"><span class="tag mb-4 d-inline-block">design</span></a>
                                    <h4 class="mb-3">
                                        <a href="course-details.html">Custom Product Design</a>
                                    </h4>
                                    <p>
                                        One make creepeth man bearing their one firmament won't fowl
                                        meat over sea
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-4 single_course">
                                <div class="course_head">
                                    <img class="img-fluid" src="img/courses/c1.jpg" alt="" />
                                </div>
                                <div class="course_content">
                                    <a href="#"><span class="tag mb-4 d-inline-block">design</span></a>
                                    <h4 class="mb-3">
                                        <a href="course-details.html">Custom Product Design</a>
                                    </h4>
                                    <p>
                                        One make creepeth man bearing their one firmament won't fowl
                                        meat over sea
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-4 single_course">
                                <div class="course_head">
                                    <img class="img-fluid" src="img/courses/c1.jpg" alt="" />
                                </div>
                                <div class="course_content">
                                    <a href="#"><span class="tag mb-4 d-inline-block">design</span></a>
                                    <h4 class="mb-3">
                                        <a href="course-details.html">Custom Product Design</a>
                                    </h4>
                                    <p>
                                        One make creepeth man bearing their one firmament won't fowl
                                        meat over sea
                                    </p>
                                </div>
                            </div>
                        </div><br />
                    </div>
                </div>
                <nav class="blog-pagination justify-content-center d-flex">
                    <ul class="pagination">
                        <li class="page-item">
                            <a href="#" class="page-link" aria-label="Previous">
                      <span aria-hidden="true">
                          <i class="ti-angle-left"></i>
                      </span>
                            </a>
                        </li>
                        <li class="page-item"><a href="#" class="page-link">01</a></li>
                        <li class="page-item active"><a href="#" class="page-link">02</a></li>
                        <li class="page-item"><a href="#" class="page-link">03</a></li>
                        <li class="page-item"><a href="#" class="page-link">04</a></li>
                        <li class="page-item"><a href="#" class="page-link">09</a></li>
                        <li class="page-item">
                            <a href="#" class="page-link" aria-label="Next">
                      <span aria-hidden="true">
                          <i class="ti-angle-right"></i>
                      </span>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>

    </div>

</div>