<div id="page-content">
    @if($value = \Illuminate\Support\Facades\Session::pull('PasswordChange'))
        <div class="alert alert-success alert-dismissible" style="z-index: 9999">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{$value}}
        </div>
    @endif
        @if($value = \Illuminate\Support\Facades\Session::pull('ProfileChange'))
            <div class="alert alert-success alert-dismissible" style="z-index: 9999">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{$value}}
            </div>
        @endif
        <!-- END Navigation info -->

        <!-- Search Results -->
        <div class="page-header page-header-top clearfix">
            <h4 class="text-center">Мої курси</h4>
            <div class="row form-horizontal">
                <!-- Dropdown Options -->
                <form class="form-horizontal">
                    <div class="col-md-4 text-center">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="text" id="example-input-typeahead" class="form-control" name="name" placeholder="Назва курсу" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Категорія:</label>
                                <select class="form-control" id="example-select" name="category" >
                                    <option value="0">--</option>
                                    @foreach(\App\Models\Category::all() as $category)
                                        @if(request()->get('category'))
                                            <option value="{{$category->id}}" {{request()->get('category') == $category->id ? 'selected' : ''}} >{{$category->title}}</option>
                                        @else
                                            <option value="{{$category->id}}" >{{$category->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <button class="btn btn-info"><i class="fa fa-filter"></i> Фільтр</button>
                            </div>
                            <div class="col-md-6 form-group">
                                <a href="/adm/courses/add" class="btn btn-success"><i class="fa fa-plus"></i> Додати курс</a>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END Dropdown Options -->
            </div>
        </div>

        <!-- Results -->
        @php
        $counter = 0;
        @endphp
        @foreach($data['courses'] as $course)
            @if($counter == 0)
            <div class="row">
            @endif
            @php
                $counter++;
            @endphp
                <div class="col-md-6">
                    <div class="media media-hover push clearfix">
                        <a class="pull-left">
                            <img src="{{'img/courses/' . $course->id . '/' . $course->img}}" class="media-object" style="max-width: 100%; width: 150px" alt="{{$course->img}}">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><small><span class="label label-success"></span></small> <a href="{{'/adm/courses/edit?id=' . $course->id}}" style="color: #000; text-decoration: none">{{$course->title}}</a> <small><span class="label label-warning">{{$course->category->title}}</span></small></h4>
                            <a href="{{'/learn/' . $course->url}}">Подивитись на сайті</a>
                            <p>{{ mb_substr($course->desc, 0, 100) . '...' }}</p>
                        </div>
                    </div>
                </div>
            @if($counter == 2)
                </div>
                @php
                    $counter = 0;
                @endphp
            @endif

        @endforeach
</div>