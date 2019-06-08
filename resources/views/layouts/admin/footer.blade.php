<!-- Footer -->
<footer></footer>
<!-- END Footer -->
</div>
<!-- END Inner Container -->
</div>
<!-- END Page Container -->

<!-- Scroll to top link, check main.js - scrollToTop() -->
<a href="javascript:void(0)" id="to-top"><i class="fa fa-chevron-up"></i></a>

<!-- User Modal Settings, appears when clicking on 'User Settings' link found on user dropdown menu (header, top right) -->
<div id="modal-user-password" class="modal">
    <!-- Modal Dialog -->
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4>Змінити пароль</h4>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Content -->
            <div class="modal-body">

                    <!-- First Tab -->
                        <form class="form-horizontal" action="{{'/adm/user/change-password/' . \Illuminate\Support\Facades\Auth::user()->id}}" method="post">
                            {{csrf_field()}}
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>Error</strong> {{$error}}
                                    </div>
                                @endforeach
                            @endif

                            <div class="form-group">
                                <label class="control-label col-md-3">{{'Ім\'я'}}</label>
                                <div class="col-md-9">
                                    <p class="form-control-static">{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                                    <span class="help-block">Для зміни імені перейдіть до наступного пункту</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="example-user-pass">Пароль</label>
                                <div class="col-md-9">
                                    <input type="password" id="example-user-pass" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="example-user-newpass">Підтвердіть пароль</label>
                                <div class="col-md-9">
                                    <input type="password" id="example-user-newpass" name="password_confirmation" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                    <button class="btn btn-success"><i class="fa fa-spinner fa-spin"></i> Save changes</button>
                                </div>
                            </div>
                        </form>
                    <!-- END First Tab -->
                </div>
                <!-- END Tab Content -->
            </div>
            <!-- END Modal Content -->

            <!-- Modal footer -->

            <!-- END Modal footer -->
        </div>
        <!-- END Modal Content -->
    </div>
    <!-- END Modal Dialog -->
</div>
<!-- END User Modal Settings -->
<div id="modal-user-settings" class="modal">
    <!-- Modal Dialog -->
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4>Змінити дані</h4>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Content -->
            <div class="modal-body">

                <!-- Second Tab -->
                <form  class="form-horizontal" action="{{'/adm/user/change-profile/' . \Illuminate\Support\Facades\Auth::user()->id}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="col-md-3">
                            <img src="{{asset('img/users/' . \Illuminate\Support\Facades\Auth::user()->id . '/' . \Illuminate\Support\Facades\Auth::user()->img)}}" alt="image" class="img-responsive push">
                        </div>
                        <div class="col-md-9">
                                <div class="fallback">
                                    <input type="file" name="file">
                                    <h4 class="page-header-sub">Персональні дані</h4>
                                    <div class="form-group">
                                        <label class="control-label col-md-3" for="name">Ім'я</label>
                                        <div class="col-md-9">
                                            <input type="text" id="example-user-firstname" name="name" class="form-control" value="{{$data['userName'][0]}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3" for="surname">Surname</label>
                                        <div class="col-md-9">
                                            <input type="text" id="example-user-lastname" name="surname" class="form-control" value="{{$data['userName'][1]}}">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group" style="padding-right: 15px;">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                <button class="btn btn-success"><i class="fa fa-spinner fa-spin"></i> Save changes</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END Second Tab -->
            </div>
            <!-- END Tab Content -->
        </div>
        <!-- END Modal Content -->

        <!-- Modal footer -->

        <!-- END Modal footer -->
    </div>
    <!-- END Modal Content -->
</div>
<!-- END Modal Dialog -->
</div>
<!-- END User Modal Settings -->

<!-- Excanvas for canvas support on IE8 -->
<!--[if lte IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

<!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

<!-- Bootstrap.js -->
<script src="{{asset('/admin/js/vendor/bootstrap.min.js')}}"></script>

<!-- Jquery plugins and custom javascript code -->
<script src="{{asset('/admin/js/plugins.js')}}"></script>
<script src="{{asset('/admin/js/main.js')}}"></script>
<script src="{{asset('/admin/js/ckeditor/ckeditor.js')}}"></script>
@if(Route::currentRouteName() == 'start-test')
    <script src="{{asset('/admin/js/dist/jquery.progressBarTimer.min.js')}}"></script>
    <script>
        $(window).bind({
            beforeunload: function() {
                $('#button').trigger('click');            }
        });
        $("#example-progress-bar").progressBarTimer({
            timeLimit: 1500, //total number of seconds
            warningThreshold: 5, //seconds remaining triggering switch to warning color
            autoStart: true, // start the countdown automatically
            onFinish: function() {}, //invoked once the timer expires
            baseStyle: 'bg-danger', //bootstrap progress bar style at the beginning of the timer
            warningStyle: 'bg-danger', //bootstrap progress bar style in the warning phase
            smooth: true, // should the timer be smooth or stepping
            completeStyle: 'bg-success' //bootstrap progress bar style at completion of timer
        }).start()
    </script>
@endif
<!-- Javascript code only for this page -->
</body>
</html>