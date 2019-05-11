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
                <div class="comments-area">
                    <h4>{{$lesson->comments->count() . ' '}}{{trans_choice('lang.lesson.comments', $lesson->comments->count())}}</h4>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c1.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Emilly Blunt</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                <a href="" class="btn-reply text-uppercase">@lang('lang.lesson.reply')</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list left-padding">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c2.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Elsie Cunningham</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list left-padding">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c3.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Annie Stephens</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment-form">
                    <h4>@lang('lang.lesson.leaveReply')</h4>
                    <form>
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-6 name">
                                <input type="text" class="form-control" id="name" placeholder="@lang('lang.lesson.name')" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = @lang('lang.lesson.name')">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 email">
                                <input type="email" class="form-control" id="email" placeholder="@lang('lang.lesson.email')"
                                       onfocus="this.placeholder = ''" onblur="this.placeholder = @lang('lang.lesson.email')">
                            </div>
                        </div>
                        <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="@lang('lang.lesson.message')"
                                          onfocus="this.placeholder = ''" onblur="this.placeholder = @lang('lang.lesson.message')" required=""></textarea>
                        </div>
                        <a href="#" class="primary-btn">@lang('lang.lesson.postComment')</a>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="@lang('lang.lesson.searchPosts')">
                            <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="ti-search"></i></button>
                                    </span>
                        </div><!-- /input-group -->
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
                                    <li><a href="#comments">{{$lesson->comments->count() > 0 ? $lesson->comments->count() : ''}}{{' ' . trans_choice('lang.lesson.comments', $lesson->comments->count())}}<i class="ti-comment"></i></a></li>
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