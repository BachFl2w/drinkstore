<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="pizza, delivery food, fast food, sushi, take away, chinese, italian food">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>{{ __('message.web') }}</title>

    <!-- Favicons-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <header>
    <div class="container-fluid">
        <div class="row">
            <div class="col--md-4 col-sm-4 col-xs-4">
                <a href="index.html" id="logo">
                <img src="{{ asset(config('asset.image_path.logo') . 'framgia-logo.png') }}" height="30" alt="" data-retina="true" class="hidden-xs">
                <img src="{{ asset(config('asset.image_path.logo') . 'framgia-logo.png') }}" height="23" alt="" data-retina="true" class="hidden-lg hidden-md hidden-sm">
                </a>
            </div>
            <nav class="col--md-8 col-sm-8 col-xs-8">
            <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>{{ __('message.menuMobile') }}</span></a>
            <div class="main-menu">
                <div id="header_menu">
                    <img src="{{ asset(config('asset.image_path.logo') . 'framgia-logo.png') }}" height="23" alt="" data-retina="true">
                </div>
                <a href="#" class="open_close" id="close_in"><i class="icon_close"></i></a>
                 <ul>
                    <li><a href="{{ route('home') }}">{{ __('message.title.home') }}</a></li>
                    <li><a href="">{{ __('message.title.cart') }}</a></li>
                    <li class="submenu">
                    <a href="javascript:void(0);" class="show-submenu">{{ __('message.product') }}<i class="icon-down-open-mini"></i></a>
                    <ul>
                        <li><a href=""></a></li>
                    </ul>
                    </li>
                    <li><a href="#">{{ __('message.title.about') }}</a></li>
                    <li class="submenu">
                    <a href="javascript:void(0);" class="show-submenu">{{ __('message.order') }}<i class="icon-down-open-mini"></i></a>
                    <ul>
                        <li><a href="#">{{ __('message.title.paid') }}</a></li>
                        <li><a href="#">{{ __('message.title.unpaid') }}</a></li>
                    </ul>
                    </li>
                    @if ($currentUser == 'Guest')
                        <li><a href="#0" data-toggle="modal" data-target="#login_2">{{ __('message.login') }}</a></li>
                    @else
                        <li class="submenu">
                            <a href="javascript:void(0);" class="show-submenu">{{ $currentUser->name }}<i class="icon-down-open-mini"></i></a>
                            <ul>
                                <li><a href="#">{{ __('message.profile') }}</a></li>
                                <li><a href="{{ route('logout') }}">{{ __('message.logout') }}</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div><!-- End main-menu -->
            </nav>
        </div><!-- End row -->
    </div><!-- End container -->
    </header>
    <!-- End Header =============================================== -->

    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="home" data-parallax="scroll" data-image-src="{{ asset(config('asset.background_1')) }}" data-natural-width="1400" data-natural-height="550">
    <div id="subheader">
        <div id="sub_content">
            <h1>{{ __('message.index.statistics') }}</h1>
            <h1><strong id="js-rotating">{{ __('message.index.rotating') }}</strong></h1>
            {!! Form::open(['method' => 'post', 'route' => ['user.search']]) !!}
                <div id="custom-search-input">
                    <div class="input-group ">
                        {!! Form::text('search', '', ['class' => 'search-query', 'placeholder' => __('message.index.search_placeholder')]) !!}
                        <span class="input-group-btn">
                            {!! Form::submit(__('message.submit'), ['class' => 'btn_search']) !!}
                        </span>
                    </div>
                </div>
            {!! Form::close() !!}
        </div><!-- End sub_content -->
    </div><!-- End subheader -->
    <div id="count" class="hidden-xs">
        <ul>
            <li><span class="number">200</span> {{ __('message.product') }}</li>
            <li><span class="number">15</span> {{ __('message.category') }}</li>
            <li><span class="number">5</span> {{ __('message.shipper') }}</li>
        </ul>
    </div>
    </section>

    @yield('page_position')

    @yield('content')

    <!-- Footer ================================================== -->
    <footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-3">
                <h3>{{ __('message.payments') }}</h3>
                <p>
                    <img src="{{ asset(config('asset.image_path.cards')) }}" alt="" class="img-responsive">
                </p>
            </div>
            <div class="col-md-3 col-sm-3">
                <h3>{{ __('message.title.about') }}</h3>
                <ul>
                    <li><a href="about.html">{{ __('message.about') }}</a></li>
                    <li><a href="faq.html">{{ __('message.faq') }}</a></li>
                    <li><a href="contacts.html">{{ __('message.title.contact') }}</a></li>
                    <li><a href="#0" data-toggle="modal" data-target="#login_2">{{ __('message.login') }}</a></li>
                    <li><a href="#0" data-toggle="modal" data-target="#register">{{ __('message.register') }}</a></li>
                    <li><a href="#0">{{ __('message.terms') }}</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3" id="newsletter">
                <h3>{{ __('message.title.news') }}</h3>
                <div id="message-newsletter_2">
                </div>
                {!! Form::open() !!}
                    <div class="form-group">
                        {!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => __('message.email')]) !!}
                    </div>
                    {!! Form::submit(__('message.submit'), ['class' => 'btn_1']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-md-2 col-sm-3">
                <h3>{{ __('message.title.setting') }}</h3>
                <div class="styled-select">
                    <select class="form-control" name="lang" id="lang" onchange="location = this.value;">
                        <option value="{!! route('user.change-language', 'en') !!}" selected>English</option>
                        <option value="{!! route('user.change-language', 'vi') !!}">Tiếng Việt</option>
                    </select>
                </div>
                <div class="styled-select">
                    <select class="form-control" name="currency" id="currency">
                        <option value="USD" selected>USD</option>
                        <option value="EUR">EUR</option>
                        <option value="GBP">GBP</option>
                        <option value="RUB">RUB</option>
                    </select>
                </div>
            </div>
        </div><!-- End row -->
        <div class="row">
            <div class="col-md-12">
                <div id="social_footer">
                    <ul>
                        <li><a href="#0"><i class="icon-facebook"></i></a></li>
                        <li><a href="#0"><i class="icon-twitter"></i></a></li>
                        <li><a href="#0"><i class="icon-google"></i></a></li>
                        <li><a href="#0"><i class="icon-instagram"></i></a></li>
                        <li><a href="#0"><i class="icon-pinterest"></i></a></li>
                        <li><a href="#0"><i class="icon-vimeo"></i></a></li>
                        <li><a href="#0"><i class="icon-youtube-play"></i></a></li>
                    </ul>
                    <p>© Framgia Coffee 2018</p>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
    </footer>
    <!-- End Footer =============================================== -->

<div class="layer"></div><!-- Mobile menu overlay mask -->

<!-- Login modal -->
<div class="modal fade" id="login_2" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            {!! Form::open(['route' => 'postLogin', 'class' => 'popup-form', 'id' => 'myLogin']) !!}
                <div class="login_icon"><i class="icon_lock_alt"></i></div>
                {!! Form::text('email', '', ['class' => 'form-control form-white', 'placeholder' => __('message.email')]) !!}
                {!! Form::password('password', ['class' => 'form-control form-white', 'placeholder' => __('message.password')]) !!}
                <div class="text-left">
                    <a href="{{ route('password.request') }}">{{ __('message.password.forgot') }}</a>
                </div>
                {!! Form::submit(__('message.login'), ['class' => 'btn btn-submit']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div><!-- End modal -->

<!-- Register modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            {!! Form::open(['method' => 'post', 'route' => 'register', 'class' => 'popup-form', 'id' => 'myRegister']) !!}
                <div class="login_icon"><i class="icon_lock_alt"></i></div>
                {!! Form::text('name', '', ['class' => 'form-control form-white', 'placeholder' => __('message.name')]) !!}
                {!! Form::hidden('role', 3, ['class' => 'd-none']) !!}
                {!! Form::text('email', '', ['class' => 'form-control form-white', 'placeholder' => __('message.email')]) !!}
                {!! Form::password('password', ['class' => 'form-control form-white', 'placeholder' => __('message.password.password')]) !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control form-white', 'placeholder' => __('message.password.confirm')]) !!}
                {!! Form::text('address', '', ['class' => 'form-control form-white', 'placeholder' => __('message.address')]) !!}
                {!! Form::number('phone', '', ['class' => 'form-control form-white', 'placeholder' => __('message.phone')]) !!}
                <div id="pass-info" class="clearfix"></div>
                <div class="checkbox-holder text-left">
                    <div class="checkbox">
                        {!! Form::checkbox('check_2', 'accept_2', true, ['id' => 'check_2']) !!}
                        {!! Form::label('check_2', __('message.agree')) !!}
                    </div>
                </div>
                {!! Form::submit(__('message.register'), ['class' => 'btn btn-submit']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>

@yield('script')

</body>

</html>
