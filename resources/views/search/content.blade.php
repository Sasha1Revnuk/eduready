<div class="popular_courses section_gap_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @php
                        $counter = 0;
                    @endphp
                    @if(!$lessons->isEmpty())
                        @foreach($lessons as $lesson)
                            @if($counter == 0)
                                <div class="row mb-3">
                                    @endif
                                    @php
                                        $counter++;
                                    @endphp
                                    <div class="col-lg-4 single_course">
                                        <div class="course_head">
                                            <img class="img-fluid" src="{{asset('img/lessons/' . $lesson->id . '/' . $lesson->img)}}" alt="" />
                                        </div>
                                        <div class="course_content">
                                            <a href="{{'/learn/' . $lesson->section->course->url}}"><span class="tag mb-4 d-inline-block">{{$lesson->section->course->title}}</span></a>
                                            <h4 class="mb-3">
                                                <a href="{{'/learn/' . $lesson->section->course->url . '/'  . $lesson->id}}">{{$lesson->title}}</a>
                                            </h4>
                                        </div>
                                    </div>
                                    @if($counter == 3)
                                </div>
                                @php
                                    $counter = 0;
                                @endphp
                            @endif
                        @endforeach
                    @else
                        <h2>@lang('lang.search.empty')</h2>
                    @endif
                </div><br />
            </div>
        </div>
    </div>
</div>
</div>