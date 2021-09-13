<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicon and Touch Icons -->
        <link href="{{ asset('images/favicon.png') }}" rel="shortcut icon" type="image/png">
        <link href="{{ asset('images/apple-touch-icon.png') }}" rel="apple-touch-icon">
        <link href="{{ asset('images/apple-touch-icon-72x72.png') }}" rel="apple-touch-icon" sizes="72x72">
        <link href="{{ asset('images/apple-touch-icon-114x114.png') }}" rel="apple-touch-icon" sizes="114x114">
        <link href="{{ asset('images/apple-touch-icon-144x144.png') }}" rel="apple-touch-icon" sizes="144x144">
        <title>{{ __('app_info.app_name') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
{{--        <link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}
        <!-- Stylesheet -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/css-plugin-collections.css') }}" rel="stylesheet"/>
        <!-- CSS | menuzord megamenu skins -->
        <link href="{{ asset('css/menuzord-megamenu.css') }}" rel="stylesheet"/>
        <!-- CSS | Main style file -->
        <link href="{{ asset('css/menuzord-skins/menuzord-boxed.css') }}" rel="stylesheet" type="text/css">
        <!-- CSS | Main style file -->
        <link href="{{ asset('css/style-main.css') }}" rel="stylesheet" type="text/css">
        <!-- CSS | Preloader Styles -->
        <link href="{{ asset('css/preloader.css') }}" rel="stylesheet" type="text/css">
        <!-- CSS | Custom Margin Padding Collection -->
        <link href="{{ asset('css/custom-bootstrap-margin-padding.css') }}" rel="stylesheet" type="text/css">
        <!-- CSS | Responsive media queries -->
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css">
        <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
        <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

        <!-- CSS | Theme Color -->
        <link href="{{ asset('css/colors/theme-skin-color-set1.css') }}" rel="stylesheet" type="text/css">

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
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
    <div id="wrapper" class="clearfix">
        <div class="main-content">
            <section id="home" class="divider bg-lighter" style="min-height: 100vh;">
                <div class="display-table">
                    <div class="display-table-cell">
                        <div class="container pb-100">
                            <div class="row">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div id="preloader">
            <div id="spinner">
                <div class="preloader-dot-loading">
                    <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
                </div>
            </div>
            <div id="disable-preloader" class="btn btn-default btn-sm"></div>
        </div>
    </div>


{{--        <div class="font-sans text-gray-900 antialiased">--}}
{{--            {{ $slot }}--}}
{{--        </div>--}}
    <script src="{{ asset('js/custom.js') }}"></script>
    </body>
</html>
