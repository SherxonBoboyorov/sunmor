@extends('layouts.front')

@section('content')

    <div class="slider">
        <div class="slider__list">
           @foreach ($sliders as $slider)
            <div class="slider__item" style="background:linear-gradient(0deg, rgba(27, 32, 42, 0.5), rgba(27, 32, 42, 0.5)), url({{ asset($slider->image) }})">
                <section class="container">
                    <div class="slider__cart">
                        <h1 class="slider__title__h1">{{ $slider->{'title_' . app()->getLocale()} }}</h1>
                        <div class="slider__text">
                            <p>{{ $slider->{'description_' . app()->getLocale()} }}</p>
                        </div>
                        <a href="#modal1" class="slider__link modal-trigger">@lang('main.get_a_quote') <span><i class="fas fa-chevron-right"></i></span></a>
                    </div>
                </section>
            </div>
           @endforeach
        </div>
    </div>


    <!-- Get a quote start -->

    @include('alert')

    <div class="get_a_quote modal" id="modal1">

        <div class="get_a_quote__cart">


            <form action="{{ route('quotecallbackSave') }}" method="POST">
                @csrf

                <h2 class="about_us__title__h2">@lang('main.get_a_quote')</h2>

                    <section class="get_a_quote__form">
                        <input class="get_a_quote__input" type="text" name="fullname" placeholder="Your name" required>
                        <input class="get_a_quote__input" type="email" name="gmail" placeholder="Email" required>
                        <input class="get_a_quote__input" type="tel" name="phone_number" placeholder="Phone" required>
                    </section>

                <button class="get_a_quote__button" type="submit">@lang('main.send') <span><i class="fas fa-chevron-right"></i></span></button>
            </form>
        </div>
    </div>

   <!-- Get a quote end -->


    <!-- about us start -->

    <div class="about_us">
        <section class="container">
            <div class="about_us__cart clearfix">
                @foreach ($aboutcompanies as $aboutcompany)

                <div class="about_us__img">
                    <img src="{{ asset($aboutcompany->image) }}" alt="about">
                </div>

                <section>
                    <h2 class="about_us__title__h2">{{ $aboutcompany->{'title_name_' . app()->getLocale()} }}</h2>
                    <div class="about_us__text">
                        <p>
                            {!! $aboutcompany->{'content_' . app()->getLocale()} !!}
                        </p>
                    </div>

                    <a href="{{ route('about') }}" class="about_us__link">@lang('main.more')</a>
                </section>
               @endforeach
            </div>
        </section>
    </div>


    <div class="services">
        <section class="container">
            <div class="services__cart">
                <h2 class="about_us__title__h2">@lang('main.services')</h2>
                <h4 class="services__title__h4">@lang('main.what_we_do')</h4>

                <div class="services__list">
                  @foreach ($pages as $page)
                    <div class="services__item">
                        <a href="{{ route('page', $page->{'slug_' . app()->getLocale()}) }}">
                            <div class="services__img">
                                <img src="{{ asset($page->image) }}" alt="services">
                            </div>

                            <h3 class="services__title__h3">{{ $page->{'title_' . app()->getLocale()} }}</h3>
                            <h5 class="services__title__h5">
                                <svg width="71" height="12" viewBox="0 0 71 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M70.5303 6.53033C70.8232 6.23744 70.8232 5.76256 70.5303 5.46967L65.7574 0.696699C65.4645 0.403806 64.9896 0.403806 64.6967 0.696699C64.4038 0.989593 64.4038 1.46447 64.6967 1.75736L68.9393 6L64.6967 10.2426C64.4038 10.5355 64.4038 11.0104 64.6967 11.3033C64.9896 11.5962 65.4645 11.5962 65.7574 11.3033L70.5303 6.53033ZM0 6.75H70V5.25H0V6.75Z" fill="#1B5178"/>
                                </svg>
                            </h5>
                        </a>
                    </div>
                   @endforeach
                </div>
            </div>
        </section>
    </div>

    <div class="why_choose">
        <section class="container">
            <div class="why_choose__cart">
                <h2 class="about_us__title__h2">@lang('main.why_choose_us')</h2>
                <h4 class="services__title__h4">@lang('main.making_the_impossible_possible')</h4>

                <div class="why_choose__list">
                  @foreach ($icons as $icon)
                    <div class="why_choose__item">
                        <div class="why_choose__icons">
                            <img src="{{ asset($icon->image) }}" alt="why_choose">
                        </div>

                        <h3 class="why_choose__title__h3">{{ $icon->{'title_' . app()->getLocale()} }}</h3>
                    </div>
                   @endforeach
                </div>
            </div>
        </section>
    </div>

    <div class="trucks">
        <section class="container">
            <div class="trucks__cart">
                <h2 class="about_us__title__h2">@lang('main.trucks')</h2>
                <h4 class="services__title__h4">@lang('main.our_fleet')</h4>
                <div class="trucks__list">
                    @foreach ($heavytrucks as $heavytruck)
                    <div class="trucks__item">
                        <a href="{{ route('heavytruck', $heavytruck->{'slug_' . app()->getLocale()}) }}">
                            <div class="trucks__img">
                                <img src="{{ asset($heavytruck->image) }}" alt="trucks">
                            </div>

                            <h3 class="trucks__title__h3">{{ $heavytruck->{'truck_name_' . app()->getLocale()} }}</h3>
                            <h5 class="trucks__title__h5">
                                <svg width="71" height="12" viewBox="0 0 71 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M70.5303 6.53033C70.8232 6.23744 70.8232 5.76256 70.5303 5.46967L65.7574 0.696699C65.4645 0.403806 64.9896 0.403806 64.6967 0.696699C64.4038 0.989593 64.4038 1.46447 64.6967 1.75736L68.9393 6L64.6967 10.2426C64.4038 10.5355 64.4038 11.0104 64.6967 11.3033C64.9896 11.5962 65.4645 11.5962 65.7574 11.3033L70.5303 6.53033ZM0 6.75H70V5.25H0V6.75Z" fill="#1B5178"/>
                                </svg>
                            </h5>
                        </a>
                    </div>
                  @endforeach
                </div>

                <div class="news__button__link">
                    <a href="{{ route('heavytrucks') }}" class="news__link">@lang('main.all_trucks')</a>
                </div>
            </div>
        </section>
    </div>

    <div class="advantages">
        <section class="container">
            <div class="advantages__cart">
                <h2 class="about_us__title__h2">@lang('main.advantages')</h2>
                <h4 class="services__title__h4">@lang('main.why_choose_us')</h4>

                <div class="advantages__list">
                  @foreach ($companynumbers as $companynumber)
                    <div class="advantages__item">
                        <h3 class="advantages__title__h3"><span class="numbers">{{ $companynumber->number }}</span>+</h3>
                        <div class="advantages__text">
                            <p>{{ $companynumber->{'number_title_' . app()->getLocale()} }}</p>
                        </div>
                    </div>
                   @endforeach
                </div>
            </div>
        </section>
    </div>

    <div class="news">
        <section class="container">
            <div class="news__cart">
                <h2 class="about_us__title__h2">@lang('main.news')</h2>
                <h4 class="services__title__h4">@lang('main.recent_events')</h4>

                <div class="news__list">
                    @foreach ($articles as $article)

                    <div class="news__item">
                        <a href="{{ route('article', $article->{'slug_' . app()->getLocale()}) }}">
                            <div class="news__img">
                                <img src="{{ asset($article->image) }}" alt="news">
                            </div>

                            <h4 class="news__title__h4">{{  date('d.m.Y', strtotime($article->created_at)) }}</h4>
                            <h3 class="news__title__h3">{{ $article->{'title_' . app()->getLocale()} }}</h3>
                            <h5 class="news__title__h5">
                                <svg width="71" height="12" viewBox="0 0 71 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M70.5303 6.53033C70.8232 6.23744 70.8232 5.76256 70.5303 5.46967L65.7574 0.696699C65.4645 0.403806 64.9896 0.403806 64.6967 0.696699C64.4038 0.989593 64.4038 1.46447 64.6967 1.75736L68.9393 6L64.6967 10.2426C64.4038 10.5355 64.4038 11.0104 64.6967 11.3033C64.9896 11.5962 65.4645 11.5962 65.7574 11.3033L70.5303 6.53033ZM0 6.75H70V5.25H0V6.75Z" fill="#1B5178"/>
                                </svg>
                            </h5>
                        </a>
                    </div>
                   @endforeach
                </div>

                <div class="news__button__link">
                    <a href="{{ route('articles') }}" class="news__link">@lang('main.all_news')</a>
                </div>
            </div>
        </section>
    </div>

    <div class="our_partners">
        <section class="container">
            <div class="our_partners__cart">
                <h2 class="about_us__title__h2">@lang('main.our_partners')</h2>
                <h4 class="services__title__h4">@lang('main.companies_that_trust_us')</h4>

                <div class="our_partners__list owl-carousel">
                    @foreach ($usefulResources as $usefulResource)

                    <div class="our_partners__item">
                        <a>
                            <img src="{{ asset($usefulResource->image) }}" alt="our_partners">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    <div class="questions">
        <section class="container">
            <div class="questions__cart">
                <div class="questions__list">
                    <div class="questions__item">
                        <h2 class="about_us__title__h2">@lang('main.do_you_have_any_questions?')</h2>
                        <a href="tel:{{ $options->where('key', 'phone')->first()->value }}" class="questions__link">Call {{ $options->where('key', 'phone')->first()->value }}</a>
                        <a href="#modal1" class="slider__link modal-trigger">@lang('main.get_a_quote')<span><i class="fas fa-chevron-right"></i></span></a>
                    </div>
                </div>
            </div>
        </section>
        <div class="questions__item__fon"></div>
    </div>

    @endsection
