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
        <div class="container pt-0 pb-0">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <a class="menuzord-brand pull-left flip sm-pull-center mb-15" href="{{route('home')}}"><img src="{{asset('images/logo-wide.png')}}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav">
        <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
            <ul class="container">
                <nav id="menuzord" class="menuzord blue no-bg">
                    @if(\Illuminate\Support\Facades\Auth::guard()->check())
{{--                        <form method="POST" action="{{ route('logout') }}">--}}
{{--                            @csrf--}}
{{--                            <div class="pull-right sm-pull-left mb-sm-15 mr-15">--}}
{{--                                <a class="btn btn-colored btn-flat btn-theme-colored mt-15 mt-sm-10 pt-10 pb-10" onclick="event.preventDefault();--}}
{{--                                                    this.closest('form').submit();">로그아웃</a>--}}
{{--                            </div>--}}

{{--                        </form>--}}
                        <ul class="menuzord-menu menuzord-right menuzord-indented scrollable" style="max-height: 400px;">
                            <li style="padding: 10px 0;"><a class="icon icon-dark icon-circled icon-border-effect effect-circled" style="padding: 8px; border-radius: 5px">

                                    <img id="img_avatar" style="width: 35px !important; height: 35px; border-radius: 50%;" src="{{ (isset(\Illuminate\Support\Facades\Auth::user()->avatar) ? \Illuminate\Support\Facades\Auth::user()->avatar : asset('images/blog/author.jpg'))}}" class="avatar brround avatar-xl"/>
                                    <label style="margin-left: 15px;">{{\Illuminate\Support\Facades\Auth::user()->name}}</label>
                                </a>
                                <ul class="dropdown" style="right: auto; display: none; min-width: 120px">
                                    <li style="min-width: 120px;">
                                        <a class="" href="{{route('profile')}}"><i class="fa fa-user"></i> 프로필보기</a>
                                    </li>
                                    <li style="min-width: 120px;">
                                        <a onclick="event.preventDefault();
                                           $(this).parent().find('form').submit();">
                                            <i class="fa fa-sign-out"></i> 로그아웃
                                        </a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                        </form>

                                    </li>
                                </ul>
                            </li>
                        </ul>

                    @else
                        <div class="pull-right sm-pull-left mb-sm-15">
                            <a class="btn btn-dark btn-theme-colored ml-3 mt-15 mb-15" href="{{ route('register') }}" style="width: 88px;">{{ __('auth.register') }}</a>
                        </div>
                        <div class="pull-right sm-pull-left mb-sm-15 mr-15">
                            <a class="btn btn-dark btn-theme-colored ml-3 mt-15 mb-15" href="{{ route('login') }}">{{ __('auth.login') }}</a>
                        </div>
                    @endif

                    <ul class="menuzord-menu">
                        @if(\Request::route()->getName() !== 'home')
                            <li class="{{\Request::route()->getName() === 'home' ? 'active' : ''}}"><a href="{{ route('home') }}">홈페이지</a>
                            </li>
                        @endif

                        @if(\Illuminate\Support\Facades\Auth::guard()->check())
                            <li class="{{\Request::route()->getName() === 'date-list' ? 'active' : ''}}" style="margin-left: 5px;"><a href="{{ route('date-list') }}">날짜별보기</a>
                            </li>
                            <li class="{{\Request::route()->getName() === 'part-list' ? 'active' : ''}}" style="margin-left: 5px;"><a href="{{ url('part-list') }}">부위별보기</a>
                            </li>
                        @endif

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
