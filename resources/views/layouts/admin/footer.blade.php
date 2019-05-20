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
<div id="modal-user-settings" class="modal">
    <!-- Modal Dialog -->
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4>Нлаштування профілю</h4>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Content -->
            <div class="modal-body">
                <!-- Tab links -->
                <ul id="example-user-tabs" class="nav nav-tabs" data-toggle="tabs">
                    <li class="active"><a href="#example-user-tabs-account"><i class="fa fa-cogs"></i>Пароль</a></li>
                    <li><a href="#example-user-tabs-profile"><i class="fa fa-user"></i> Профіль</a></li>
                </ul>
                <!-- END Tab links -->

                <!-- END Tab Content -->
                <div class="tab-content">
                    <!-- First Tab -->
                    <div class="tab-pane active" id="example-user-tabs-account">
                        <form class="form-horizontal">
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
                                    <input type="password" id="example-user-newpass" name="confirm_password" class="form-control">
                                </div>
                            </div>
                            <div class="remove-margin">
                                <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                <button class="btn btn-success"><i class="fa fa-spinner fa-spin"></i> Save changes</button>
                            </div>
                        </form>
                    </div>
                    <!-- END First Tab -->

                    <!-- Second Tab -->
                    <div class="tab-pane" id="example-user-tabs-profile">
                        <h4 class="page-header-sub">Аватар</h4>
                        <div class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <img src="{{asset('admin/img/placeholders/image_dark_120x120.png')}}" alt="image" class="img-responsive push">
                                </div>
                                <div class="col-md-9">
                                    <form class="form-horizontal">
                                        <div class="fallback">
                                            <input name="file" type="file">
                                            <h4 class="page-header-sub">Персональні дані</h4>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="example-user-firstname">Ім'я</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="example-user-firstname" name="name" class="form-control" value="{{$data['userName'][0]}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="example-user-lastname">Surname</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="example-user-lastname" name="example-user-lastname" class="form-control" value="{{$data['userName'][1]}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="remove-margin">
                                            <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                            <button class="btn btn-success"><i class="fa fa-spinner fa-spin"></i> Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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

<!-- Javascript code only for this page -->
</body>
</html>