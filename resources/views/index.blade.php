@include('layouts.main-header')
<!--================ End Header Menu Area =================-->

<!--================ Start Home Banner Area =================-->
<section class="home_banner_area">
    <div class="banner_inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner_content text-center">
                        <p class="text-uppercase">
                            @lang('lang.main.bannerMsg1')
                        </p>
                        <h2 class="text-uppercase mt-4 mb-5">
                            @lang('lang.main.bannerMsg2')
                        </h2>
                        <div>
                            <a href="#" class="primary-btn2 mb-3 mb-sm-0">@lang('lang.main.bannerBtnQuestion')</a>
                            <a href="#" class="primary-btn ml-sm-3 ml-0">@lang('lang.main.bannerBtnCources')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->

<!--================ Start Feature Area =================-->
<section class="feature_area section_gap_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="main_title">
                    <h2 class="mb-3"> @lang('lang.main.advantages')</h2>
                    <p>
                        @lang('lang.main.subAdvantages')
                    </p>
                </div>
            </div>
        </div>
        <div class="row ">
            @foreach($advantages as $item)
            <div class="col-lg-4 col-md-6 row-flex">
                <div class="single_feature">
                    <div class="icon"><span class="{{$item->icon}}"></span></div>
                    <div class="desc">
                        <h4 class="mt-3 mb-2">{{$item->title}}</h4>
                        <p>
                            {{$item->text}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--================ End Feature Area =================-->

<!--================ Start Popular Courses Area =================-->
<div class="popular_courses">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="main_title">
                    <h2 class="mb-3">Our Popular Courses</h2>
                    <p>
                        Replenish man have thing gathering lights yielding shall you
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single course -->
            <div class="col-lg-12">
                <div class="owl-carousel active_course">
                    <div class="single_course">
                        <div class="course_head">
                            <img class="img-fluid" src="{{asset('img/courses/c1.jpg')}}" alt="" />
                        </div>
                        <div class="course_content">
                            <span class="tag mb-4 d-inline-block">design</span>
                            <h4 class="mb-3">
                                <a href="course-details.html">Custom Product Design</a>
                            </h4>
                            <p>
                                One make creepeth man bearing their one firmament won't fowl
                                meat over sea
                            </p>
                        </div>
                    </div>
                    <div class="single_course">
                        <div class="course_head">
                            <img class="img-fluid" src="{{asset('img/courses/c1.jpg')}}" alt="" />
                        </div>
                        <div class="course_content">
                            <span class="tag mb-4 d-inline-block">design</span>
                            <h4 class="mb-3">
                                <a href="course-details.html">Custom Product Design</a>
                            </h4>
                            <p>
                                One make creepeth man bearing their one firmament won't fowl
                                meat over sea
                            </p>
                        </div>
                    </div>
                    <div class="single_course">
                        <div class="course_head">
                            <img class="img-fluid" src="{{asset('img/courses/c1.jpg')}}" alt="" />
                        </div>
                        <div class="course_content">
                            <span class="tag mb-4 d-inline-block">design</span>
                            <h4 class="mb-3">
                                <a href="course-details.html">Custom Product Design</a>
                            </h4>
                            <p>
                                One make creepeth man bearing their one firmament won't fowl
                                meat over sea
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================ End Popular Courses Area =================-->
<!--================ Start Events Area =================-->
<div class="events_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="main_title">
                    <h2 class="mb-3 text-white">Найбижчі події</h2>
                    <p>
                        Replenish man have thing gathering lights yielding shall you
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="single_event position-relative">
                    <div class="event_thumb">
                        <img src="{{asset('img/event/e1.jpg')}}" alt="" />
                    </div>
                    <div class="event_details">
                        <div class="d-flex mb-4">
                            <div class="date"><span>15</span> Jun</div>

                            <div class="time-location">
                                <p>
                                    <span class="ti-time mr-2"></span> 12:00 AM - 12:30 AM
                                </p>
                                <p>
                                    <span class="ti-location-pin mr-2"></span> Hilton Quebec
                                </p>
                            </div>
                        </div>
                        <p>
                            One make creepeth man for so bearing their firmament won't
                            fowl meat over seas great
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="single_event position-relative">
                    <div class="event_thumb">
                        <img src="{{asset('img/event/e2.jpg')}}" alt="" />
                    </div>
                    <div class="event_details">
                        <div class="d-flex mb-4">
                            <div class="date"><span>15</span> Jun</div>

                            <div class="time-location">
                                <p>
                                    <span class="ti-time mr-2"></span> 12:00 AM - 12:30 AM
                                </p>
                                <p>
                                    <span class="ti-location-pin mr-2"></span> Hilton Quebec
                                </p>
                            </div>
                        </div>
                        <p>
                            One make creepeth man for so bearing their firmament won't
                            fowl meat over seas great
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================ End Events Area =================-->
<!--================ Start Testimonial Area =================-->
<div class="testimonial_area section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="main_title">
                    <h2 class="mb-3">Client say about me</h2>
                    <p>
                        Replenish man have thing gathering lights yielding shall you
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="testi_slider owl-carousel">
                <div class="testi_item">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <img src="{{asset('img/testimonials/t1.jpg')}}" alt="" />
                        </div>
                        <div class="col-lg-8">
                            <div class="testi_text">
                                <h4>Elite Martin</h4>
                                <p>
                                    Him, made can't called over won't there on divide there
                                    male fish beast own his day third seed sixth seas unto.
                                    Saw from
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi_item">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <img src="{{asset('img/testimonials/t2.jpg')}}" alt="" />
                        </div>
                        <div class="col-lg-8">
                            <div class="testi_text">
                                <h4>Davil Saden</h4>
                                <p>
                                    Him, made can't called over won't there on divide there
                                    male fish beast own his day third seed sixth seas unto.
                                    Saw from
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi_item">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <img src="{{asset('img/testimonials/t1.jpg')}}" alt="" />
                        </div>
                        <div class="col-lg-8">
                            <div class="testi_text">
                                <h4>Elite Martin</h4>
                                <p>
                                    Him, made can't called over won't there on divide there
                                    male fish beast own his day third seed sixth seas unto.
                                    Saw from
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi_item">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <img src="{{asset('img/testimonials/t2.jpg')}}" alt="" />
                        </div>
                        <div class="col-lg-8">
                            <div class="testi_text">
                                <h4>Davil Saden</h4>
                                <p>
                                    Him, made can't called over won't there on divide there
                                    male fish beast own his day third seed sixth seas unto.
                                    Saw from
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi_item">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <img src="{{asset('img/testimonials/t1.jpg')}}" alt="" />
                        </div>
                        <div class="col-lg-8">
                            <div class="testi_text">
                                <h4>Elite Martin</h4>
                                <p>
                                    Him, made can't called over won't there on divide there
                                    male fish beast own his day third seed sixth seas unto.
                                    Saw from
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi_item">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <img src="{{asset('img/testimonials/t2.jpg')}}" alt="" />
                        </div>
                        <div class="col-lg-8">
                            <div class="testi_text">
                                <h4>Davil Saden</h4>
                                <p>
                                    Him, made can't called over won't there on divide there
                                    male fish beast own his day third seed sixth seas unto.
                                    Saw from
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================ End Testimonial Area =================-->

<!--================ Start footer Area  =================-->
@include('layouts.footer')