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

            <!-- Dropdown Options -->
            <form class="form-horizontal">
                <div class="form-box-content">
                    <div class="form-group">
                        <div class="col-md-4">
                            <input type="text" id="example-input-typeahead" class="name" placeholder="Назва курсу" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Категорія:</label>
                            <select id="example-select" name="category" >
                                <option>--</option>
                                <option>css</option>
                                <option>javascript</option>
                                <option>php</option>
                                <option>mysql</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <button class="btn btn-success"><i class="fa fa-wrench"></i> Фільтр</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-md-4">
                <a href="#" class="btn btn-success"><i class="fa fa-plus"></i> Додати курс</a>
            </div>
            <!-- END Dropdown Options -->

            <h4 class="pull-left">Мої курси</h4>
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
                        <a href="#" class="pull-left">
                            <img src="img/placeholders/image_dark_120x120.png" class="media-object" alt="Image">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><small><span class="label label-success"></span></small> <a href="" style="color: #000; text-decoration: none">Project #1</a> <small><span class="label label-warning">7-2013</span></small></h4>
                            <a href="javascript:void(0)">http://example-link-1.com</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus.</p>
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