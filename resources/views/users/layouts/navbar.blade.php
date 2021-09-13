<!-- Header -->
<header id="header" class="header">
    <div class="header-top bg-theme-colored sm-text-center" style="display:none;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                </div>
                <div class="col-md-4">
                    <div class="widget pull-right flip sm-pull-none">
                        <div id="side-panel-trigger" class="side-panel-trigger mt-5">
                            <a href="#"><i class="fa fa-bars text-white font-24"></i></a>
                        </div>
                    </div>
                    <div class="widget">
                        <ul class="list-inline text-right flip sm-text-center">
                            <li>
                                <a class="text-white" href="#">FAQ</a>
                            </li>
                            <li class="text-white">|</li>
                            <li>
                                <a class="text-white" href="#">Help Desk</a>
                            </li>
                            <li class="text-white">|</li>
                            <li>
                                <a class="text-white" href="#">Support</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle p-0 bg-lighter xs-text-center">
        <div class="container pt-20 pb-20">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <a class="menuzord-brand pull-left flip sm-pull-center mb-15" href="index-mp-layout1.html"><img src="images/logo-wide.png" alt=""></a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9">
                    <div class="header-widget-contact-info-box sm-text-center">
                        <div class="media element contact-info">
                            <div class="media-left">
                                <a href="#">
                                    <i class="fa fa-envelope text-theme-colored font-icon sm-display-block"></i>
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="#" class="title">Mail Us Today</a>
                                <h5 class="media-heading subtitle">info@yourdomain.com</h5>
                            </div>
                        </div>
                        <div class="media element contact-info">
                            <div class="media-left">
                                <a href="#">
                                    <i class="fa fa-phone-square text-theme-colored font-icon sm-display-block"></i>
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="#" class="title">Call us for more details</a>
                                <h5 class="media-heading subtitle">+(012) 345 6789</h5>
                            </div>
                        </div>
                        <div class="media element contact-info">
                            <div class="media-left">
                                <a href="#">
                                    <i class="fa fa-building-o text-theme-colored font-icon sm-display-block"></i>
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="#" class="title">Company Location</a>
                                <h5 class="media-heading subtitle">121 King Street, Melbourne</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav">
        <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
            <div class="container">
                <nav id="menuzord" class="menuzord blue no-bg">
                    <div class="pull-right sm-pull-left mb-sm-15">
                        <a class="btn btn-colored btn-flat btn-theme-colored mt-15 mt-sm-10 pt-10 pb-10" href="{{ route('register') }}">{{ __('auth.register') }}</a>
                    </div>
                    <div class="pull-right sm-pull-left mb-sm-15 mr-15">
                        <a class="btn btn-colored btn-flat btn-theme-colored mt-15 mt-sm-10 pt-10 pb-10" href="{{ route('login') }}">{{ __('auth.login') }}</a>
                    </div>

                    <ul class="menuzord-menu">
                        <li class="active"><a href="{{ url('') }}">Home</a>
                            <ul class="dropdown">
                                <li><a href="#">Multipage Layouts</a>
                                    <ul class="dropdown">
                                        <li><a href="index-mp-layout1.html">Layout1</a></li>
                                        <li><a href="index-mp-layout2.html">Layout2</a></li>
                                        <li><a href="index-mp-layout3.html">Layout3</a></li>
                                        <li><a href="index-mp-layout4.html">Layout4</a></li>
                                        <li><a href="index-mp-layout5.html">Layout5</a></li>
                                        <li><a href="index-mp-layout6.html">Layout6</a></li>
                                        <li><a href="index-mp-layout7.html">Layout7</a></li>
                                        <li><a href="index-mp-layout8.html">Layout8</a></li>
                                        <li><a href="index-mp-layout9.html">Layout9</a></li>
                                        <li><a href="index-mp-layout10.html">Layout10</a></li>
                                        <li><a href="index-mp-layout11.html">Layout11</a></li>
                                        <li><a href="index-mp-layout12.html">Layout12</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Singlepage Layouts</a>
                                    <ul class="dropdown">
                                        <li><a href="index-sp-layout1.html">Layout1</a></li>
                                        <li><a href="index-sp-layout2.html">Layout2</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Boxed Layouts</a>
                                    <ul class="dropdown">
                                        <li><a href="index-boxed-mp-layout1.html">Multipage Layout1</a></li>
                                        <li><a href="index-boxed-mp-layout2.html">Multipage Layout2</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">RTL Layouts</a>
                                    <ul class="dropdown">
                                        <li><a href="index-rtl-mp-layout1.html">Layout1</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Hot Layouts</a>
                                    <ul class="dropdown">
                                        <li><a href="index-hot-parallax-layout1.html">Hot Parallax Layout</a></li>
                                        <li><a href="index-hot-slider-fullpage-layout1.html">Hot Fullpage Slider Layout</a></li>
                                        <li><a href="index-hot-slider-pagepiling-layout1.html">Hot Slider Pagepiling Layout</a></li>
                                        <li><a href="index-hot-slider-split-home-layout1.html">Hot Slider Split Layout</a></li>
                                        <li><a href="index-hot-vertical-rev-slider-home-layout1.html">Hot Vertical Rev Slider Layout</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Home Variations</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Rev Slider</a>
                                            <ul class="dropdown">
                                                <li><a href="index-home-variation-revslider-style1.html">Layout1</a></li>
                                                <li><a href="index-home-variation-revslider-style2.html">Layout2</a></li>
                                                <li><a href="index-home-variation-revslider-style3.html">Layout3</a></li>
                                                <li><a href="index-home-variation-revslider-style4.html">Layout4</a></li>
                                                <li><a href="index-home-variation-revslider-style5.html">Layout5</a></li>
                                                <li><a href="index-home-variation-revslider-style6.html">Layout6</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Maximage Slider</a>
                                            <ul class="dropdown">
                                                <li><a href="index-home-variation-maximageslider-style1.html">Layout1</a></li>
                                                <li><a href="index-home-variation-maximageslider-style2.html">Layout2</a></li>
                                                <li><a href="index-home-variation-maximageslider-style3.html">Layout3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="index-home-variation-owl-carousel.html">Owl Carousel</a></li>
                                        <li><a href="index-home-variation-owl-image-slider.html">Owl Image Slider</a></li>
                                        <li><a href="index-home-variation-typed-text.html">Typed Text Layout</a></li>
                                        <li><a href="index-home-variation-video-background.html">Youtube Background Video</a></li>
                                        <li><a href="index-home-variation-html5-video.html">Html5 Background Video</a></li>
                                        <li><a href="index-home-variation-bg-image-parallax.html">Bg Image Parallax Layout</a></li>
                                        <li><a href="index-home-variation-bg-static.html">Bg Static Layout</a></li>
                                        <li><a href="#">Home Appointment Form</a>
                                            <ul class="dropdown">
                                                <li><a href="index-home-variation-appointment-form-style1.html">Layout1</a></li>
                                                <li><a href="index-home-variation-appointment-form-style2.html">Layout2</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
