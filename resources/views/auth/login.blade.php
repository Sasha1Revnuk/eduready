<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title>Sign In</title>

    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{asset('/admin/img/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{asset('/admin/img/icon57.png')}}" sizes="57x57">
    <link rel="apple-touch-icon" href="{{asset('/admin/img/icon72.png')}}" sizes="72x72">
    <link rel="apple-touch-icon" href="{{asset('/admin/img/icon76.png')}}" sizes="76x76">
    <link rel="apple-touch-icon" href="{{asset('/admin/img/icon114.png')}}" sizes="114x114">
    <link rel="apple-touch-icon" href="{{asset('/admin/img/icon120.png')}}" sizes="120x120">
    <link rel="apple-touch-icon" href="{{asset('/admin/img/icon144.png')}}" sizes="144x144">
    <link rel="apple-touch-icon" href="{{asset('/admin/img/icon152.png')}}" sizes="152x152">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Bootstrap is included in its original form, unaltered -->
    <link rel="stylesheet" href="{{asset('/admin/css/bootstrap.css')}}">

    <!-- Related styles of various javascript plugins -->
    <link rel="stylesheet" href="{{asset('/admin/css/plugins.css')}}">

    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="{{asset('/admin/css/main.css')}}">
    <!-- END Stylesheets -->

    <!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
    <script src="{{asset('/admin/js/vendor/modernizr-respond.min.js')}}"></script>
</head>
<body class="login">

<!-- Login Container -->
<div id="login-container" style="width: 320px">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong> {{$error}}
            </div>
        @endforeach
    @endif
    <div id="login-logo" style="margin-bottom: 20px">
        <a href="{{route('main')}}" style="text-decoration: none"><h2 style="color:#002347"><span style="color:#fdc632">< &#8260; > </span><strong>eduready</strong></h2></a>
    </div>
    <!-- Login Form -->
    <form  role="form" method="POST" action="{{ url('/login') }}"   class="form-horizontal">
        {{csrf_field()}}
        <div class="form-group">
            <div class="col-xs-12">
                <div class="input-group">
                    <input type="text" id="login-email" name="email" placeholder="Email.." class="form-control">
                    <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <div class="input-group">
                    <input type="password" id="login-password" name="password" placeholder="Пароль..." class="form-control">
                    <span class="input-group-addon"><i class="fa fa-asterisk fa-fw"></i></span>
                </div>
            </div>
        </div>
        <div class="clearfix">
            <div class="btn-group btn-group-sm pull-right">
                <button type="submit" class="btn btn-success"><i class="fa fa-arrow-right"></i> Увійти</button>
            </div>
        </div>
    </form>

    <!-- END Login Form -->
</div>
<!-- END Login Container -->

<!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

<!-- Bootstrap.js -->
<script src="{{asset('/admin/js/vendor/bootstrap.min.js')}}"></script>

<!-- Jquery plugins and custom javascript code -->
<script src="{{asset('/admin/js/plugins.js')}}"></script>
<script src="{{asset('/admin/js/main.js')}}"></script>

<!-- Javascript code only for this page -->
<script>
    $(function () {
        var loginButtons = $('#login-buttons');
        var loginForm = $('#login-form');

        // Reveal login form
        $('#login-btn-email').click(function () {
            loginButtons.slideUp(600);
            loginForm.slideDown(450);
        });

        // Hide login form
        $('.login-back').click(function () {
            loginForm.slideUp(450);
            loginButtons.slideDown(600);
        });
    });
</script>

<script>

</script>
</body>
</html>