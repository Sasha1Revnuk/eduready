<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title>{{$data['title']}}</title>


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

    <!-- Stylesheets -->
    <!-- Bootstrap is included in its original form, unaltered -->
    <link rel="stylesheet" href="{{asset('/admin/css/bootstrap.css')}}">

    <!-- Related styles of various javascript plugins -->
    <link rel="stylesheet" href="{{asset('/admin/css/plugins.css')}}">

    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="{{asset('/admin/css/main.css')}}">

    <!-- Load a specific file here from css/themes/ folder to alter the default theme of the template -->

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    <link rel="stylesheet" href="{{asset('/admin/css/themes.css')}}">
    <!-- END Stylesheets -->

    <!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
    <script src="{{asset('/admin/js/vendor/modernizr-respond.min.js')}}"></script>
</head>

<!-- Add the class .fixed to <body> for a fixed layout on large resolutions (min: 1200px) -->
<!-- <body class="fixed"> -->
<body>
<!-- Page Container -->
<div id="page-container">
    <!-- Header -->
    <!-- Add the class .navbar-fixed-top or .navbar-fixed-bottom for a fixed header on top or bottom respectively -->
    <!-- <header class="navbar navbar-inverse navbar-fixed-top"> -->
    <!-- <header class="navbar navbar-inverse navbar-fixed-bottom"> -->
    <header class="navbar navbar-inverse">
        <!-- Mobile Navigation, Shows up  on smaller screens -->
        <ul class="navbar-nav-custom pull-right hidden-md hidden-lg">
            <li class="divider-vertical"></li>
            <li>
                <!-- It is set to open and close the main navigation on smaller screens. The class .navbar-main-collapse was added to aside#page-sidebar -->
                <a href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </a>
            </li>
        </ul>
        <!-- END Mobile Navigation -->

        <!-- Logo -->
        <a href="/" class="navbar-brand"><img src="{{asset('admin/img/template/logo.png')}}" alt="logo"></a>

        <!-- Loading Indicator, Used for demostrating how loading of widgets could happen, check main.js - uiDemo() -->
        <div id="loading" class="pull-left"><i class="fa fa-certificate fa-spin"></i></div>

        <!-- Header Widgets -->
        <!-- You can create the widgets you want by replicating the following. Each one exists in a <li> element -->
        <ul id="widgets" class="navbar-nav-custom pull-right">
            <!-- Just a divider -->
            <li class="divider-vertical"></li>


            <!-- User Menu -->
            <li class="dropdown pull-right dropdown-user">
                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('img/users/' . \Illuminate\Support\Facades\Auth::user()->id . '/' . \Illuminate\Support\Facades\Auth::user()->img)}}" alt="avatar" width="30px" height="30px"> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li class="divider"></li>
                    <li>
                        <!-- Modal div is at the bottom of the page before including javascript code -->
                        <a href="#modal-user-password" role="button" data-toggle="modal"><i class="fa fa-cogs"></i> Change Password</a>
                    </li>
                    <li>
                        <!-- Modal div is at the bottom of the page before including javascript code -->
                        <a href="#modal-user-settings" role="button" data-toggle="modal"><i class="fa fa-user"></i> User Profile</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="/logout"><i class="fa fa-lock"></i>Log out</a>
                    </li>
                </ul>
            </li>
            <!-- END User Menu -->
        </ul>
        <!-- END Header Widgets -->
    </header>
    <!-- END Header -->

    <!-- Inner Container -->
    <div id="inner-container">
        <!-- Sidebar -->
        <aside id="page-sidebar" class="collapse navbar-collapse navbar-main-collapse">
            <!-- Sidebar search -->
            <form id="sidebar-search" action="page_search_results.html" method="post">
                <div class="input-group">
                    <input type="text" id="sidebar-search-term" name="sidebar-search-term" placeholder="Пошук...">
                    <button><i class="fa fa-search"></i></button>
                </div>
            </form>
            <!-- END Sidebar search -->

            <!-- Primary Navigation -->
            @include('admin.menu')
            <!-- END Primary Navigation -->

            <!-- Demo Theme Options -->
            <!-- END Demo Theme Options -->
        </aside>
        <!-- END Sidebar -->