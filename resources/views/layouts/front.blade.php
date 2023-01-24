<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('front/foto/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('front/foto/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front/foto/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('front/foto/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('front/foto/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Sunmort-Imports</title>
    <link rel="stylesheet" href="{{ asset('front/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/fancybox-main.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.css') }}">
    @yield('css')

    {!! Meta::toHtml() !!}

</head>
<body>

    <header>
        <div class="header">
            <div class="header__cart">

                <div class="header__top">

                    <section class="container">
                        <div class="header__top__cart">
                            <ul class="header__contact">
                                <li>
                                    <a href="tel:{{ $options->where('key', 'phone')->first()->value }}"class="header__contact__link">
                                        <span>@lang('main.phone_number')</span>{{ $options->where('key', 'phone')->first()->value }}
                                    </a>
                                </li>
                                <li>
                                    <a class="header__contact__link">
                                        <span>@lang('main.address')</span>{{ $options->where('key', 'address_' . app()->getLocale())->first()->value }}
                                    </a>
                                </li>
                            </ul>

                            <ul class="header__ru">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                  <li>
                                     <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                       {{ $properties['native'] }}
                                    </a>
                                </li>
                               @endforeach
                            </ul>
                        </div>
                    </section>

                </div>

                <section class="container">
                    <div class="header__bottom">

                        <div class="header__logo">
                            <a href="{{ route('/') }}">
                                <img src="{{ asset('front/foto/logo.svg') }}" alt="logo">
                            </a>
                        </div>

                        <ul class="header__menu sidenav" id="slide-out">
                            <li>
                                <a href="{{ route('about') }}" class="header__menu__link">
                                    @lang('main.about')
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('pages') }}" class="header__menu__link">
                                    @lang('main.services')
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('heavytrucks') }}" class="header__menu__link">
                                    @lang('main.trucks')
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('career') }}" class="header__menu__link">
                                    @lang('main.career')
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('contact') }}" class="header__menu__link">
                                    @lang('main.contacts')
                                </a>
                            </li>
                        </ul>

                        <button class="header__burger__none sidenav-trigger" data-target="slide-out"><i class="fa-solid fa-bars"></i></button>

                    </div>
                </section>

            </div>
        </div>
    </header>

    @yield('content')

    <footer>
        <div class="footer">
            <section class="container">
                <div class="footer__cart">
                    <div class="footer__list">

                        <ul class="footer__menu">
                            <li>
                                <a href="{{ route('about') }}" class="footer__link">@lang('main.about')</a>
                            </li>

                            <li>
                                <a href="{{ route('pages') }}" class="footer__link">@lang('main.services')</a>
                            </li>

                            <li>
                                <a href="{{ route('heavytrucks') }}" class="footer__link">@lang('main.trucks') </a>
                            </li>

                            <li>
                                <a href="{{ route('career') }}" class="footer__link">@lang('main.career')</a>
                            </li>

                            <li>
                                <a href="{{ route('contact') }}" class="footer__link">@lang('main.contacts') </a>
                            </li>
                        </ul>

                        <section>

                            <h4 class="footer__title__h4">«Sunmor Imports LTD» @lang('main.all_rights_reserved')</h4>
                            <h4 class="footer__title__h4">© Copyright 2022 - Web developed by SOS Group</h4>

                            <ul class="footer__menu__icons">
                                <li>
                                    <a href="{{ $options->where('key', 'instagram')->first()->value }}" class="footer__link__icons"><i class="fab fa-instagram"></i></a>
                                </li>

                                <li>
                                    <a href="{{ $options->where('key', 'facebook')->first()->value }}" class="footer__link__icons"><i class="fab fa-facebook-f"></i></a>
                                </li>

                                <li>
                                    <a href="{{ $options->where('key', 'youtube')->first()->value }}" class="footer__link__icons"><i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>

                        </section>
                    </div>
                </div>
            </section>
        </div>
    </footer>


<script src="{{ asset('front/js/jquery-3.6.1.min.js') }}"></script>
<script src="{{ asset('front/js/slick.min.js') }}"></script>
<script src="{{ asset('front/js/owl.carousel.js') }}"></script>
<script src="{{ asset('front/js/materialize.min.js') }}"></script>
<script src="{{ asset('front/js/fancyapps-ui.js') }}"></script>
<script src="{{ asset('front/js/fancybox_main.js') }}"></script>
<script src="{{ asset('front/js/slic.js') }}"></script>
<script src="{{ asset('front/js/index.js') }}"></script>
@yield('js')
</body>
</html>


