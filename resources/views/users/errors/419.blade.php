<!DOCTYPE html>
<html dir="ltr" lang="en">

<!-- demo/page-404-style2.html  [XR&CO'2014], Wed, 03 Feb 2021 11:23:41 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('images/favicon.png') }}" rel="shortcut icon" type="image/png">
    <link href="{{ asset('images/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="{{ asset('images/apple-touch-icon-72x72.png') }}" rel="apple-touch-icon" sizes="72x72">
    <link href="{{ asset('images/apple-touch-icon-114x114.png') }}" rel="apple-touch-icon" sizes="114x114">
    <link href="{{ asset('images/apple-touch-icon-144x144.png') }}" rel="apple-touch-icon" sizes="144x144">
    <title>{{ __('app_info.app_name') }}</title>

    <!-- Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/css-plugin-collections.css') }}" rel="stylesheet"/>

    <!-- CSS | menuzord megamenu skins -->
    <link href="{{ asset('css/menuzord-megamenu.css') }}" rel="stylesheet"/>
    <link id="menuzord-menu-skins" href="{{ asset('css/style-main.css') }}" rel="stylesheet"/>
    <!-- CSS | Main style file -->
    <link href="{{ asset('css/menuzord-skins/menuzord-boxed.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Preloader Styles -->
    <link href="{{ asset('css/preloader.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Custom Margin Padding Collection -->
    <link href="{{ asset('css/custom-bootstrap-margin-padding.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Responsive media queries -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css">

    <!-- CSS | Theme Color -->
    <link href="css/colors/theme-skin-color-set1.css" rel="stylesheet" type="text/css">

    <!-- Scripts -->
    <!-- external javascripts -->
    <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- JS | jquery plugin collection for this theme -->
    <script src="{{ asset('js/jquery-plugin-collection.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="">
<div id="wrapper" class="clearfix">
    <!-- preloader -->
    <div id="preloader">
        <div id="spinner">
            <div class="preloader-dot-loading">
                <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
            </div>
        </div>
        <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
    </div>

    <!-- Start main-content -->
    <div class="main-content">
        <!-- Section: home -->
        <section id="home" class="fullscreen bg-lightest">
            <div class="display-table text-center">
                <div class="display-table-cell">
                    <div class="container pt-0 pb-0">
                        <div class="row">
                            <div class="col-md-7">
                                <h1 class="font-200 line-height-1em mt-0 mb-0 text-theme-colored">419!</h1>
                                <h2 class="mt-0">Oops! Page Not Found</h2>
                                <p>The page you were looking for could not be found.</p>
                                <a class="btn btn-border btn-gray btn-transparent btn-circled smooth-scroll-to-target" href="#contact">Return Home
                                </a>
                            </div>
                            <div class="col-md-4">
                                <h3>Some Useful Links</h3>
                                <div class="widget">
                                    <ul class="list-border">
                                        <li><a target="blank" href="index-mp-layout1.html">Home</a></li>
                                        <li><a href="#">About us</a></li>
                                        <li><a href="#">Sitemap</a></li>
                                        <li><a href="#">Faq's</a></li>
                                        <li><a target="blank" href="page-contact1.html">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end main-content -->

    <!-- Footer -->
{{--    <footer id="footer" class="footer">--}}
{{--        <div class="container p-20">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12 text-center">--}}
{{--                    <p class="mb-0">Copyright &copy;2016 ThemeMascot. All Rights Reserved</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </footer>--}}
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="js/custom.js"></script>

</body>

<!-- demo/page-404-style2.html  [XR&CO'2014], Wed, 03 Feb 2021 11:23:41 GMT -->
</html>
