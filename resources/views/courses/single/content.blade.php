<section class="course_details_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 course_details_left">
                <div class="main_image">
                    <img class="img-fluid" src="{{asset('img/courses/' . $course->id . '/' . $course->img)}}" alt="">
                </div>
                <div class="content_wrapper">
                    <h4 class="title">@lang('lang.singleCourse.description')</h4>
                    <div class="content">
                        {!! $course->description !!}
                    </div>
                    <h4 class="title">@lang('lang.singleCourse.sections')</h4>
                    <div class="content">
                        <ul class="course_list">
                            @foreach($course->sections as $section)
                            <li class="justify-content-between d-flex">

                                    <p><b>{{$section->title}}</b></p>

                                <a class="primary-btn text-uppercase" data-toggle="collapse" data-target="{{'#collapse' . $section->id}}" aria-expanded="true" aria-controls="{{'collapse' . $section->id}}">@lang('lang.singleCourse.viewButton')</a>
                            </li>
                            <p>
                            <ul class="course_details_left collapse" id="{{'collapse' . $section->id}}">
                                @foreach($section->lessons as $lesson)
                                    <li class="justify-content-between d-flex"><a class="lessonLink" href="{{'/learn/' . $course->url . '/'  . $lesson->id}}">{{$lesson->title}}</a></li>
                                @endforeach

                            </ul>
                            </p>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 right-contents">
                <ul>
                    <li>
                        <a class="justify-content-between d-flex" href="{{'/search/author/' . $author->id}}">
                            <p>@lang('lang.singleCourse.author')</p>
                            <span class="or">{{$author->name}}</span>
                        </a>
                    </li>
                    <li>
                        <a class="justify-content-between d-flex" href="{{'/category/' . $course->category->url}}">
                            <p>@lang('lang.singleCourse.category')</p>
                            <span class="or">{{$course->category->title}}</span>
                        </a>
                    </li>
                </ul>
                @if(\Illuminate\Support\Facades\Auth::check() && in_array($course->id, $coursesArray))
                    <a href="{{'/unsubscribe/' . $course->id}}" class="primary-btn2 text-uppercase enroll rounded-0 ">@lang('lang.singleCourse.unsubscribeButton')</a>

                @else
                    <a href="{{ Auth::check() ? '/subscribe/' . $course->id : '/login'}}" class="primary-btn2 text-uppercase enroll rounded-0 ">@lang('lang.singleCourse.enrolButton')</a>

                @endif
            </div>
        </div>
    </div>
</section>