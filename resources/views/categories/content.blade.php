<div class="popular_courses section_gap_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="main_title">
                    <h2 class="mb-3">{{$category->title}}</h2>
                </div>
            </div>
        </div>
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
                                @if($counter == 3)
                                    </div>
                                    @php
                                        $counter = 0;
                                    @endphp
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @include('categories.pagination')

</div>
</div>
</div>