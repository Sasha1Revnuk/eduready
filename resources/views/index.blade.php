@include('layouts.main-header')
<!--================ End Header Menu Area =================-->

<!--================ Start Home Banner Area =================-->
@if($value = \Illuminate\Support\Facades\Session::pull('FailedReady'))
    <div class="alert alert-danger alert-dismissible" style="z-index: 9999">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{$value}}
    </div>
@endif
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
                            <a href="{{route('coursesPage')}}" class="primary-btn2 mb-3 mb-sm-0">@lang('lang.main.bannerBtnQuestion')</a>
                            <a href="{{route('contact')}}" class="primary-btn ml-sm-3 ml-0">@lang('lang.main.bannerBtnCources')</a>
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
                    <h2 class="mb-3">@lang('lang.main.courses')</h2>
                    <p>
                        @lang('lang.main.subCourses')
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single course -->
            <div class="col-lg-12"  >
                <div class="owl-carousel active_course" >
                    @foreach($courses as $course)
                        <div class="single_course" >
                            <div class="course_head " >
                                <img class="img-fluid" src="{{asset('img/courses/' . $course->id . '/' . $course->img)}}" alt="{{$course->img}}" />
                            </div>
                            <div class="course_content" style="text-align: center">
                                <a href="{{'/category/' . $course->category->url}}"><span class="tag mb-4 d-inline-block">{{$course->category->title}}</span></a>
                                @if(!empty($coursesArray) && in_array($course->id, $coursesArray))
                                    <span class="tag mb-4 d-inline-block" style="background-color: #fdc632; color: #ffffff">@lang('lang.courses.subscribeSpan')</span>
                                @endif
                                <h4 class="mb-3">
                                    <a href="{{'/learn/' . $course->url}}">{{$course->title}}</a>
                                </h4>
                                <p>
                                    {{ mb_substr($course->desc, 0, 100) . '...' }}
                                </p>
                            </div>
                        </div>
                    @endforeach
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
                    <h2 class="mb-3 text-white">@lang('lang.main.events')</h2>
                    <p>
                        @lang('lang.main.subEvents')
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($events as $event)
                <div class="col-lg-6 col-md-6">
                    <div class="single_event position-relative">
                    <div class="event_thumb">
                        <img src="{{asset('img/events/' . $event->img)}}" alt="{{$event->img}}" />
                    </div>
                    <div class="event_details">
                        <div class="d-flex mb-4">
                            <div class="date"><span>{{$event->day}}</span>{{$event->month}}</div>

                            <div class="time-location">
                                <p>
                                    <span class="ti-time mr-2"></span> {{$event->time}}
                                </p>
                                <p>
                                    <span class="ti-location-pin mr-2"></span> {{$event->title}}
                                </p>
                            </div>
                        </div>
                        <p>
                            {{$event->text}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
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
                    <h2 class="mb-3">@lang('lang.main.feedbacks')</h2>
                    <p>
                        @lang('lang.main.subFeedbacks')
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="testi_slider owl-carousel">
                @foreach($feedbacks as $feedback)
                <div class="testi_item">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            @if($feedback->user->img != 'user.jpg')
                                <img src="{{ asset('img/users/' . $feedback->user->id . '/' . $feedback->user->img)}}" alt="{{$feedback->user->img}}" />
                            @else
                                <img src="{{ asset('img/users/' . $feedback->user->img)}}" alt="{{$feedback->user->img}}" />
                            @endif
                        </div>
                        <div class="col-lg-8">
                            <div class="testi_text">
                                <h4>{{$feedback->title}}</h4>
                                <p><strong>Course: </strong>{{$feedback->course->title}}</p>
                                <p>
                                    {{$feedback->text}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--================ End Testimonial Area =================-->

<!--================ Start footer Area  =================-->
@include('layouts.footer')