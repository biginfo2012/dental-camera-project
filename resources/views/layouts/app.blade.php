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
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Stylesheet -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/css-plugin-collections.css') }}" rel="stylesheet"/>
        <!-- CSS | menuzord megamenu skins -->
        <link href="{{ asset('css/menuzord-megamenu.css') }}" rel="stylesheet"/>
        <link id="menuzord-menu-skins" href="{{ asset('css/app.css') }}" rel="stylesheet"/>
        <!-- CSS | Main style file -->
        <link href="{{ asset('css/menuzord-skins/menuzord-boxed.css') }}" rel="stylesheet" type="text/css">
        <!-- CSS | Preloader Styles -->
        <link href="{{ asset('css/preloader.css') }}" rel="stylesheet" type="text/css">
        <!-- CSS | Custom Margin Padding Collection -->
        <link href="{{ asset('css/custom-bootstrap-margin-padding.css') }}" rel="stylesheet" type="text/css">
        <!-- CSS | Responsive media queries -->
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css">
        <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
        <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

        <!-- Revolution Slider 5.x CSS settings -->
        <link  href="{{ asset('js/revolution-slider/css/settings.css') }}" rel="stylesheet" type="text/css"/>
        <link  href="{{ asset('js/revolution-slider/css/layers.css') }}" rel="stylesheet" type="text/css"/>
        <link  href="{{ asset('js/revolution-slider/css/navigation.css') }}" rel="stylesheet" type="text/css"/>

        <!-- CSS | Theme Color -->
        <link href="{{ asset('css/colors/theme-skin-color-set1.css') }}" rel="stylesheet" type="text/css">


        <!-- Scripts -->
        <!-- external javascripts -->
        <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- JS | jquery plugin collection for this theme -->
        <script src="{{ asset('js/jquery-plugin-collection.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
