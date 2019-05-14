<section class="blog_area single-post-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{asset('img/lessons/' . $lesson->id . '/' . $lesson->img)}}" alt="{{$lesson->title}}">
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 blog_details">
                        <h2>{{$lesson->title}}</h2>
                       {!! $lesson->text !!}
                    </div>
                </div>
                <a name="comments"></a>
                <div class="navigation-area"></div>

            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="{{route('SearchPage')}}" method="post" action="{{route('SearchPage')}}">
                            {{csrf_field()}}
                        <div class="input-group">
                            <input name= "title" type="text" class="form-control" placeholder="@lang('lang.lesson.searchPosts')">
                        </div><!-- /input-group -->
                        </form>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget author_widget">
                        <div class="col-lg-12  col-md-12">
                            <div class="blog_info text-left">
                                <div class="post_tag">
                                    <a class="active">{{$lesson->section->title}}</a>
                                </div>
                                <ul class="blog_meta list">
                                    <li><a>{{Carbon\Carbon::parse($lesson->created_ad)->format('d M Y')}}<i class="ti-calendar"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">@lang('lang.lesson.lessonsInSection')</h4>
                        <ul class="list cat-list ">
                            @foreach($lessons as $item)
                                <li class="{{$item->id == $lesson->id ? 'li-active' : ''}}">
                                    <a href="{{'/learn/' . $item->section->course->url . '/' . $item->id}}" class="d-flex justify-content-between" >
                                        <p class="{{$item->id == $lesson->id ? 'p-active' : ''}}">{{$item->title}}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="br"></div>
                    </aside>

                    <aside class="single-sidebar-widget tag_cloud_widget">
                        <h4 class="widget_title">@lang('lang.lesson.categories')</h4>
                        <ul class="list">
                            @foreach(\App\Models\Category::all() as $category)
                                <li><a href="{{'/category/' . $category->url}}">{{$category->title}}</a></li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>